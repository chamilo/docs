# Lixeiras para exercícios e percursos de aprendizagem

O Chamilo 3.1 pode arquivar tentativas de exercício excluídas e dados de acompanhamento de percursos de aprendizagem para que docentes autorizados possam restaurá-los, de acordo com a retenção e os controles de acesso configurados. As lixeiras protegem dados de acompanhamento; elas não substituem cópias de segurança do banco de dados.

## Restaurar uma tentativa de exercício

1. Abra a página de **Relatórios** do exercício afetado com o curso ou a sessão corretos selecionados.
2. Selecione **Lixeira** para exibir as tentativas arquivadas.
3. Identifique o estudante e a tentativa que você precisa recuperar.
4. Selecione **Restaurar**, confirme e atualize o relatório para verificar respostas e pontuações.

Você deve ter permissão para gerenciar resultados de exercícios. A restauração pode ser bloqueada quando o exercício está bloqueado pelo Gradebook ou quando a plataforma restringe o acesso dos docentes aos resultados.

## Restaurar o progresso do percurso de aprendizagem

1. Abra a tela de relatórios do percurso de aprendizagem relevante para o curso/sessão pretendidos.
2. Abra a respectiva **Lixeira**.
3. Selecione o progresso arquivado do estudante e **Restaure**-o.
4. Verifique o progresso restaurado da lição e as tentativas de exercício associadas.

Quando uma tentativa de exercício faz parte de um arquivamento pendente de percurso de aprendizagem, restaure primeiro o arquivamento do percurso de aprendizagem. A restauração individual é deliberadamente bloqueada para evitar progresso inconsistente.

## Retenção e limpeza (administradores)

A configuração `tracking.recycle_bin_retention_hours` controla por quanto tempo os arquivos permanecem elegíveis para recuperação. O padrão inicial é de **30 dias** (720 horas). Instalações existentes devem sincronizar a nova configuração por meio da migração settings-upsert do projeto antes de esperar que a interface de administração a exiba.

Pré-visualize uma limpeza sem excluir nada:

```bash
php bin/console chamilo:recycle-bin:purge
```

A exclusão permanente exige uma opção explícita:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

O comando oferece suporte a `--hours` (substituição da retenção), `--scan-limit`, `--after-lp-id` e `--after-exercise-id` para processamento controlado. Agende-o somente após verificar a política de retenção e as providências de cópia de segurança. **Não há um agendamento implícito de expurgo automático** apenas porque o recurso está habilitado.

Consulte [Exercícios](exercises.md) e [Percursos de aprendizagem](../adding-content/learning-paths.md). Implementação: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).