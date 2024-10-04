<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Modelos e Relacionamentos para CRM de Saúde

## Usuários e Autenticação
1. `Usuário`
    - id (chave primária)
    - nome
    - email
    - senha
    - está_ativo
    - último_login_em
    - criado_em
    - atualizado_em

2. `Role`
    - id (chave primária)
    - nome
    - descrição
    - criado_em
    - atualizado_em

3. `Permissão`
    - id (chave primária)
    - nome
    - descrição
    - criado_em
    - atualizado_em

4. `permissions_has_role`
    - role_id (chave estrangeira para Role)
    - permission_id (chave estrangeira para Permissão)

5  - 'role_has_user'
- role_id (chave estrangeira para Role)
- user_id (chave estrangeira para User)

## Pacientes e Prontuários
5. `Paciente`
    - id (chave primária)
    - user_id (chave estrangeira para Usuário, opcional para portal do paciente)
    - primeiro_nome
    - sobrenome
    - data_de_nascimento
    - sexo
    - cpf (documento de identificação brasileiro)
    - rg
    - endereço
    - telefone
    - email
    - contato_de_emergência
    - tipo_sanguíneo
    - criado_em
    - atualizado_em

6. `Prontuário`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - criado_por (chave estrangeira para Usuário)
    - atualizado_por (chave estrangeira para Usuário)
    - queixa_principal
    - história_da_doença_atual
    - antecedentes_pessoais
    - medicamentos
    - alergias
    - antecedentes_familiares
    - histórico_social
    - revisão_dos_sistemas
    - exame_físico
    - avaliação
    - plano
    - criado_em
    - atualizado_em

7. `Alergia`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - alérgeno
    - reação
    - severidade
    - criado_em
    - atualizado_em

8. `Medicação`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - nome
    - dosagem
    - frequência
    - data_de_início
    - data_de_término
    - prescrito_por (chave estrangeira para Usuário)
    - criado_em
    - atualizado_em

## Agendamento e Consultas
9. `Consulta`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - doctor_id (chave estrangeira para Usuário)
    - appointment_type_id (chave estrangeira para TipoConsulta)
    - hora_de_início
    - hora_de_término
    - status (agendado, confirmado, concluído, cancelado)
    - anotações
    - criado_em
    - atualizado_em

10. `TipoConsulta`
    - id (chave primária)
    - nome
    - duração
    - cor
    - criado_em
    - atualizado_em

11. `ConsultaDetalhada`
    - id (chave primária)
    - appointment_id (chave estrangeira para Consulta)
    - medical_record_id (chave estrangeira para Prontuário)
    - anotações
    - diagnóstico
    - plano_de_tratamento
    - acompanhamento
    - criado_em
    - atualizado_em

## Prescrições e Exames
12. `Prescrição`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - doctor_id (chave estrangeira para Usuário)
    - consultation_id (chave estrangeira para ConsultaDetalhada)
    - data_da_prescrição
    - anotações
    - criado_em
    - atualizado_em

13. `ItemPrescrição`
    - id (chave primária)
    - prescription_id (chave estrangeira para Prescrição)
    - nome_do_medicamento
    - dosagem
    - frequência
    - duração
    - instruções
    - criado_em
    - atualizado_em

14. `ExameLaboratorial`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - doctor_id (chave estrangeira para Usuário)
    - tipo_de_exame
    - data_do_exame
    - resultados
    - anotações
    - criado_em
    - atualizado_em

## Faturamento e Pagamentos
15. `Fatura`
    - id (chave primária)
    - patient_id (chave estrangeira para Paciente)
    - consultation_id (chave estrangeira para ConsultaDetalhada)
    - valor_total
    - status (pendente, pago, vencido)
    - data_de_vencimento
    - pago_em
    - criado_em
    - atualizado_em

16. `ItemFatura`
    - id (chave primária)
    - invoice_id (chave estrangeira para Fatura)
    - descrição
    - quantidade
    - preço_unitário
    - preço_total
    - criado_em
    - atualizado_em

17. `Pagamento`
    - id (chave primária)
    - invoice_id (chave estrangeira para Fatura)
    - valor
    - método_de_pagamento
    - id_da_transação
    - data_do_pagamento
    - criado_em
    - atualizado_em

## Comunicação
18. `Mensagem`
    - id (chave primária)
    - remetente_id (chave estrangeira para Usuário)
    - destinatário_id (chave estrangeira para Usuário)
    - assunto
    - corpo
    - lida_em
    - criado_em
    - atualizado_em

19. `Notificação`
    - id (chave primária)
    - user_id (chave estrangeira para Usuário)
    - tipo
    - dados (JSON)
    - lida_em
    - criado_em
    - atualizado_em

## Telemedicina
20. `SessãoTeleconsulta`
    - id (chave primária)
    - appointment_id (chave estrangeira para Consulta)
    - hora_de_início
    - hora_de_término
    - status (agendada, em progresso, concluída, cancelada)
    - url_do_video
    - anotações
    - criado_em
    - atualizado_em

## Auditoria e Logs
21. `LogAuditoria`
    - id (chave primária)
    - user_id (chave estrangeira para Usuário)
    - ação
    - tipo_de_modelo
    - modelo_id
    - valores_antigos (JSON)
    - novos_valores (JSON)
    - endereço_ip
    - agente_de_usuario
    - criado_em


# Sprint Todo List - Sistema CRM para Clínica de Saúde

## Dia 1
- [ ] Implementar alteração de status da consulta
- [ ] Desenvolver funcionalidade para remarcar consultas
- [ ] Iniciar o sistema de notificação para consultas próximas

## Dia 2
- [ ] Finalizar sistema de notificação (5 minutos antes da consulta)
- [ ] Implementar envio de link do Google Meet para telemedicina
- [ ] Começar a criação do módulo de prontuários

## Dia 3
- [ ] Finalizar módulo de criação de prontuários para consultas realizadas
- [ ] Implementar sistema de anexos para prontuários e consultas

## Dia 4
- [ ] Desenvolver funcionalidade para receitar medicamentos
- [ ] Iniciar implementação do sistema de checkout de pagamento

## Dia 5
- [ ] Finalizar sistema de checkout de pagamento
- [ ] Implementar notificação de remarcação para paciente e médico

## Dia 6
- [ ] Realizar testes integrados das funcionalidades implementadas
- [ ] Corrigir eventuais bugs encontrados

## Dia 7
- [ ] Finalizar correções e ajustes
- [ ] Preparar documentação das novas funcionalidades
- [ ] Planejar a próxima sprint

