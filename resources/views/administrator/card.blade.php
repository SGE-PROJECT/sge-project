
    @vite('resources/css/administrator/card.css')

    <div class="carta-payment ">
        <div class="carta-header">
            <div class="amount">
                <div class="gauge">
                    <div class="gauge__body">
                        <div class="gauge__fill"></div>
                        <div class="gauge__cover">
                            <span>{{ $number }}</span>
                        </div>
                    </div>
                </div>
                <h2 class="ctitulo">{{ $name }}</h2>
            </div>
        </div>
    </div>

