<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TermsAndConditions;

class TermsAndConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TermsAndConditions::create([
            'content' => '<ul>
                <li><b>Cancelación Anticipada:</b> Puedes cancelar tu reservación sin cargos adicionales hasta 48 horas antes de la fecha de check-in del hotel o de la fecha de salida del vuelo. Después de este período, se aplicarán cargos por cancelación.</li>
                <li><b>Cargo por Cancelación:</b> Si cancelas dentro de las 48 horas anteriores a la fecha de check-in o de la fecha de salida del vuelo, se aplicará un cargo por cancelación equivalente al 50% del costo total de la reservación.</li>
                <li><b>No Show:</b> En caso de no presentarse (No Show) sin previa cancelación, se cobrará el 100% del costo total de la reservación.</li>
                <li><b>Reembolsos:</b> Los reembolsos se procesarán dentro de los 7 días hábiles siguientes a la solicitud de cancelación, y se realizarán a la misma forma de pago utilizada al hacer la reservación.</li>
                <li><b>Excepciones:</b> Las políticas de cancelación pueden variar para ciertas promociones y tarifas especiales. Por favor, revisa los términos y condiciones específicos de tu reservación.</li>
            </ul>'
        ]);
    }
}
