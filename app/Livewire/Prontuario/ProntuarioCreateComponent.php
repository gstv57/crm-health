<?php

namespace App\Livewire\Prontuario;

use App\Livewire\Consulta\Medico\GerenciarConsultaComponent;
use App\Models\{Consulta, Prontuario};
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProntuarioCreateComponent extends Component
{
    use LivewireAlert;

    public Consulta $consulta;

    #[Validate('nullable|string')]
    public $queixa_principal = '';

    #[Validate('nullable|string')]
    public $historia_doenca_atual = '';

    #[Validate('nullable|string')]
    public $historia_patologica_pregressa = '';

    #[Validate('nullable|string')]
    public $historia_familiar = '';

    #[Validate('nullable|string')]
    public $antecedentes_pessoais = '';

    #[Validate('nullable|string')]
    public $medicamentos = '';

    #[Validate('nullable|string')]
    public $alergias = '';

    #[Validate('nullable|string')]
    public $antecedentes_familiares = '';

    #[Validate('nullable|string')]
    public $historico_social = '';

    #[Validate('nullable|string')]
    public $pressao_arterial = '';

    #[Validate('nullable|string')]
    public $frequencia_cardiaca = '';

    #[Validate('nullable|string')]
    public $temperatura = '';

    #[Validate('nullable|string')]
    public $frequencia_respiratoria = '';

    #[Validate('nullable|string')]
    public $exame_fisico_geral = '';

    #[Validate('nullable|string')]
    public $exame_sistematico = '';

    #[Validate('nullable|string')]
    public $hipoteses_diagnosticas = '';

    #[Validate('nullable|string')]
    public $exames_solicitados = '';

    #[Validate('nullable|string')]
    public $resultados_exames = '';

    #[Validate('nullable|string')]
    public $diagnostico_final = '';

    #[Validate('nullable|string')]
    public $plano_terapeutico = '';

    #[Validate('nullable|string')]
    public $prescricao_medica = '';

    #[Validate('nullable|string')]
    public $revisao_dos_sistemas = '';

    #[Validate('nullable|string')]
    public $avaliacao = '';

    #[Validate('nullable|string')]
    public $plano = '';

    public function render(): View
    {
        return view('livewire.prontuario.prontuario-component');
    }
    public function mount(Consulta $consulta): void
    {
        $this->consulta = $consulta->load('paciente');
    }

    public function submit()
    {
        $this->validate();

        Prontuario::create([
            'consulta_id'                   => $this->consulta->id,
            'paciente_id'                   => $this->consulta->paciente->id,
            'criador_id'                    => auth()->user()->id,
            'queixa_principal'              => $this->queixa_principal,
            'historia_doenca_atual'         => $this->historia_doenca_atual,
            'historia_patologica_pregressa' => $this->historia_patologica_pregressa,
            'historia_familiar'             => $this->historia_familiar,
            'antecedentes_pessoais'         => $this->antecedentes_pessoais,
            'medicamentos'                  => $this->medicamentos,
            'alergias'                      => $this->alergias,
            'historico_social'              => $this->historico_social,
            'pressao_arterial'              => $this->pressao_arterial,
            'frequencia_cardiaca'           => $this->frequencia_cardiaca,
            'temperatura'                   => $this->temperatura,
            'frequencia_respiratoria'       => $this->frequencia_respiratoria,
            'exame_fisico_geral'            => $this->exame_fisico_geral,
            'exame_sistematico'             => $this->exame_sistematico,
            'hipoteses_diagnosticas'        => $this->hipoteses_diagnosticas,
            'exames_solicitados'            => $this->exames_solicitados,
            'resultados_exames'             => $this->resultados_exames,
            'diagnostico_final'             => $this->diagnostico_final,
            'plano_terapeutico'             => $this->plano_terapeutico,
            'prescricao_medica'             => $this->prescricao_medica,
            'revisao_dos_sistemas'          => $this->revisao_dos_sistemas,
            'avaliacao'                     => $this->avaliacao,
            'plano'                         => $this->plano,
        ]);

        $this->dispatch('prontuario_created')->to(GerenciarConsultaComponent::class);
        $this->alert('success', 'Prontuario criado com sucesso!');
        $this->reset();
    }
}
