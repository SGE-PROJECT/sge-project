<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\management\Program;
use Spatie\Permission\Models\Role;
use App\Models\management\Division;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $user = User::firstOrNew(['email' => $row['email']]);
    
        if (!$user->exists) {
            $user->slug = $this->makeSlugUnique(Str::slug($row['name'], '-'));
            $user->name = $row['name'];
            $user->password = Hash::make($row['password']);
            $user->phone_number = $row['phone_number'];
            $user->save();
        } else {
            $user->update([
                'name' => $row['name'],
                'password' => Hash::make($row['password']),
                'phone_number' => $row['phone_number'],
            ]);
        }
    
        $groupId = $this->assignGroup($user->id, $row['division_id']);
    
        if (!$groupId) {
            Log::error('No se pudo asignar un grupo al estudiante.', ['email' => $row['email']]);
            return null;
        }
    
        $student = Student::updateOrCreate(
            ['registration_number' => $row['registration_number']],
            [
                'user_id' => $user->id,
                'academic_advisor_id' => $row['academic_advisor_id'],
                'division_id' => $row['division_id'],
                'group_id' => $groupId,
            ] 
        );
    
        Log::info($student->wasRecentlyCreated ? 'Estudiante creado.' : 'Estudiante actualizado.', ['id' => $student->id]);
        
        return null;
    }

    private function assignGroup($userId, $divisionId) {
        $programPrefixes = [
            1 => 'SM',
            2 => 'SM',
            3 => 'SM',
            4 => 'SM',
            5 => 'Merca',
            6 => 'Conta',
            7 => 'Capital',
            8 => 'Productos',
            9 => 'Hotelería',
            10 => 'Terapia',
            11 => 'Gastro'
        ];
    
        $programs = Program::where('division_id', $divisionId)->get();
        $isOdd = $userId % 2 !== 0;
        $groupSuffix = $isOdd ? '11' : '22';  // Usar '11' para impar y '22' para par
    
        foreach ($programs as $program) {
            $prefix = $programPrefixes[$program->id] ?? 'SM';  
            $pattern = $prefix . '%' . $groupSuffix;
            $group = $program->groups()
                             ->where('name', 'like', $pattern)
                             ->withCount('students')
                             ->having('students_count', '<', 30)
                             ->first();
    
            if ($group) {
                return $group->id; 
            }
        }
    
        Log::error('No disponible grupo encontrado para la división y paridad dada.', ['division_id' => $divisionId, 'user_id' => $userId]);
    }
      
    private function makeSlugUnique($slug)
    {
        $baseSlug = $slug;
        $counter = 1;
        while (User::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }
        return $slug;
    }
    
    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|numeric',
            'registration_number' => 'required|numeric|unique:students,registration_number',
            'academic_advisor_id' => 'required|exists:academic_advisors,id',
            'division_id' => 'required|exists:divisions,id',
        ];
    }
}
