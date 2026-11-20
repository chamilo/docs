# Caixas de reciclagem para exercícios e percursos de aprendizagem

O Chamilo 3.1 pode arquivar tentativas de exercícios eliminadas e dados de acompanhamento de percursos de aprendizagem, para que docentes autorizados os possam restaurar, sujeitos à retenção e aos controlos de acesso configurados. As caixas de reciclagem protegem os dados de acompanhamento; não substituem as cópias de segurança da base de dados.

## Restaurar uma tentativa de exercício

1. Abra a página de **Relatórios** do exercício afetado, com o curso ou a sessão corretos selecionados.
2. Selecione **Caixa de reciclagem** para apresentar as tentativas arquivadas.
3. Identifique o formando e a tentativa que pretende recuperar.
4. Selecione **Restaurar**, confirme e atualize o relatório para verificar as respostas e as pontuações.

É necessário ter permissão para gerir os resultados dos exercícios. A restauração pode ser bloqueada quando o exercício está bloqueado pelo Gradebook ou quando a plataforma restringe o acesso dos docentes aos resultados.

## Restaurar o progresso do percurso de aprendizagem

1. Abra o ecrã de relatórios do percurso de aprendizagem relevante para o curso/sessão pretendidos.
2. Abra a respetiva **Caixa de reciclagem**.
3. Selecione o progresso arquivado do formando e **Restaure**-o.
4. Verifique o progresso da lição restaurado e as tentativas de exercício associadas.

Quando uma tentativa de exercício faz parte de um arquivo pendente de percurso de aprendizagem, restaure primeiro o arquivo do percurso de aprendizagem. A restauração individual é deliberadamente bloqueada para evitar progressos inconsistentes.

## Retenção e limpeza (administradores)

A definição `tracking.recycle_bin_retention_hours` controla durante quanto tempo os arquivos permanecem elegíveis para recuperação. O valor inicial predefinido é de **30 dias** (720 horas). As instalações existentes devem sincronizar a nova definição através da migração settings-upsert do projeto antes de esperar que a interface de administração a apresente.

Pré-visualize uma limpeza sem eliminar nada:

```bash
php bin/console chamilo:recycle-bin:purge
```

A eliminação permanente requer uma opção explícita:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

O comando suporta `--hours` (substituição da retenção), `--scan-limit`, `--after-lp-id` e `--after-exercise-id` para um processamento controlado. Agende-o apenas depois de verificar a política de retenção e as disposições de cópia de segurança. **Não existe um agendamento implícito de purga automática** apenas porque a funcionalidade está ativada.

Consulte [Exercícios](exercises.md) e [Percursos de aprendizagem](../adding-content/learning-paths.md). Implementação: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).