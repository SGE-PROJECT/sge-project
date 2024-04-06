$(document).ready(function() {
    // Función para marcar o desmarcar los permisos relacionados
    function updateRelatedPermissions(start, end, relatedPermissionId) {
        var anyRelatedSelected = false;
        $('input[name="permissions[]"]').each(function() {
            var permissionId = parseInt($(this).attr('id').replace('permission', ''));
            if (permissionId >= start && permissionId <= end) {
                if ($(this).is(':checked')) {
                    anyRelatedSelected = true;
                }
            }
        });
        $('#' + relatedPermissionId).prop('checked', anyRelatedSelected);
    }

    // Manejar el cambio de los permisos principales independientemente de los permisos relacionados
    $('#permission1, #permission6, #permission10, #permission14').change(function() {
        var permissionId = $(this).attr('id');
        if (!$(this).is(':checked')) {
            // Si se desmarca un permiso principal, desmarcar todos los permisos relacionados
            $('input[name="permissions[]"]').filter('[id^="' + permissionId + '"]').prop('checked',
                false);
        }
    });

    // Manejar los cambios en los permisos relacionados
    $('input[name="permissions[]"]').change(function() {
        var permissionId = parseInt($(this).attr('id').replace('permission', ''));
        if (permissionId >= 2 && permissionId <= 5) {
            updateRelatedPermissions(2, 5, 'permission1');
        } else if (permissionId >= 7 && permissionId <= 9) {
            updateRelatedPermissions(7, 9, 'permission6');
        } else if (permissionId >= 11 && permissionId <= 13) {
            updateRelatedPermissions(11, 13, 'permission10');
        } else if (permissionId >= 15 && permissionId <= 17) {
            updateRelatedPermissions(15, 17, 'permission14');
        }
    });
});