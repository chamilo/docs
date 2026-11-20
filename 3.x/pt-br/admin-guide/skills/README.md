# Competências

O bloco **Skills** no painel de administração agrupa as ferramentas para definir, organizar e acompanhar distintivos de competência (“skills”) em toda a plataforma. Uma competência pode ser concedida automaticamente quando um aluno atinge um limiar no boletim, conclui cursos específicos, ou manualmente por um professor, e pode ter um ícone no estilo de distintivo e um nível (por exemplo Bronze/Prata/Ouro).

![O bloco Skills no painel de administração, listando Roda de competências, Importação de competências, Gerenciar competências, Gerenciar níveis de competências, Ranking de competências e Competências e avaliações](/.gitbook/assets/admin-skills-block.png)

O bloco inteiro só aparece se a configuração **Enable skills tool** (`skill.allow_skills_tool`, em Configuration Settings > Skills) estiver ativada — ela vem habilitada por padrão.

## Acessando o bloco Skills

No painel de administração, o bloco **Skills** aparece ao lado dos demais blocos do painel. Clique em qualquer um dos seus links para abrir a ferramenta correspondente.

## O que há no bloco

* **[Gerenciando competências](managing-skills.md)** — Crie competências, importe-as em lote e atribua cada uma a uma escala de níveis
* **[Roda de competências](skills-wheel.md)** — Um mapa visual com zoom de toda a árvore de competências
* **[Ranking de competências](skills-ranking.md)** — Um ranking de usuários pelas competências adquiridas
* **[Competências e avaliações](skills-assessments.md)** — Vincule categorias do boletim às competências que elas concedem

## Configurações relacionadas

Algumas outras configurações em Configuration Settings > Skills alteram quem pode fazer o quê com este bloco:

* **Allow HR skills management** (`allow_hr_skills_management`) — Permite que usuários Human Resources Manager gerenciem competências juntamente com os administradores
* **Allow private skills** (`allow_private_skills`)
* **Teachers can assign skills** (`skills_teachers_can_assign_skills`)
* **Hide skill levels** (`hide_skill_levels`)
* **Show full skill name on skill wheel** (`show_full_skill_name_on_skill_wheel`)