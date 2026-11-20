# Históricos académicos

O Chamilo pode produzir um **histórico académico não oficial** a partir dos cursos concluídos e certificados de um aluno e permitir que o pessoal autorizado emita um **histórico oficial assinado**. Esta funcionalidade é distinta de um certificado individual de curso ou da sua verificação opcional na rede de testes Sepolia.

## Ativar a funcionalidade

Em **Administração > Definições de configuração > Certificados**, ative **Históricos académicos** (`certificate.transcript_enabled`). Está desativada por predefinição. Reveja as definições adicionais de programa, escala de classificação, horas do curso, número de estudante, endereço e signatário em [Definições de certificados](../platform-settings/certificate-settings.md#transcript_enabled).

O histórico utiliza certificados gerados pela **categoria raiz do livro de notas** dos cursos e sessões elegíveis. Inclui apenas cursos no URL de acesso atual nos quais o aluno continua inscrito. Um curso sem um certificado elegível não contribui com uma linha.

A classificação final apresentada é uma média das pontuações percentuais dos cursos listados; o GPA é a média não ponderada dos pontos de classificação mapeados. Ambos dependem dos cursos incluídos no momento da consulta ou da emissão.

## Colunas do histórico

| Coluna | Conteúdo |
|--------|---------|
| **Curso** | O código do curso, ou o nome do departamento do curso (`transcript_course_code_source`) |
| **Descrição** | O título do curso e o título da sessão, no caso de um curso realizado numa sessão |
| **Inscrição** | A data em que o aluno se inscreveu no curso ou na sessão |
| **Horas exigidas** | O valor do campo extra do curso definido em `transcript_hours_extra_field`, ou a duração do curso |
| **Data de conclusão** | A data do certificado |
| **Horas concluídas** | O tempo que o aluno dedicou ao curso, ou as horas exigidas quando `transcript_completed_hours_are_required_hours` está ativado |
| **Classificação final** | A pontuação do certificado |
| **Classificação** | A letra de `transcript_grading_scale` correspondente a essa pontuação |

## Aceder ao histórico de um aluno

1. Aceda a **Administração > Utilizadores > Lista de utilizadores** e localize o aluno. Uma ação **Histórico** está disponível para administradores autorizados e administradores de sessão quando a funcionalidade está ativada.
2. Em alternativa, utilize a ação **Histórico** na página de detalhe do relatório global de um aluno elegível.
3. Reveja a lista de cursos, as classificações, as datas, as horas, a classificação final e o GPA do aluno.
4. Selecione **Descarregar histórico não oficial** para obter um PDF construído a partir dos registos atuais do aluno.

A página do histórico também está diretamente disponível em `/transcript?userId=<user-id>` para quem estiver autorizado a aceder aos registos desse aluno. Não interprete o conhecimento do URL ou do identificador de utilizador como autorização: o acesso é verificado no lado do servidor.

Um aluno pode ver o **seu próprio** histórico, mas não pode emitir nem revogar um histórico oficial. Os emissores autorizados são:

* Administradores da plataforma/portal que atuam no âmbito dos utilizadores e dos URL de acesso que administram.
* Gestores de recursos humanos, relativamente aos alunos que acompanham.
* Administradores de sessão, relativamente aos alunos inscritos numa sessão que administram.

Estas permissões são avaliadas por aluno; o simples facto de ter um papel de pessoal não concede acesso a todos os históricos.

![O histórico de um aluno visto por um administrador, com os cursos, a classificação final, o GPA e a escala de classificação, a lista de históricos oficiais e o bloco da imagem de assinatura](../../.gitbook/assets/admin-transcript-user.png)

## Emitir e verificar um histórico oficial

1. Na página de histórico de um aluno autorizado, verifique os cursos, as classificações e as informações pessoais atualmente apresentados.
2. Selecione **Emitir histórico oficial** e confirme. O Chamilo guarda um instantâneo assinado da informação nesse momento.
3. A nova entrada aparece em **Históricos oficiais**, com a respetiva data de emissão e o emissor.
4. Utilize **Descarregar** para o PDF oficial ou **Verificar** para abrir a página pública de verificação.
5. Se necessário, um emissor autorizado pode **Revogar** esse histórico oficial. A página de verificação passará então a indicar que se encontra revogado.

Cada histórico emitido é armazenado separadamente: emitir uma versão mais recente não reescreve silenciosamente um registo assinado anterior. As ligações de verificação seguem `/transcripts/verify/<token>` e expõem também uma resposta `.json`. Quem possuir a ligação de verificação pode confirmar a validade sem iniciar sessão; mantenha estas ligações sob controlo adequado, porque uma verificação válida expõe os detalhes do histórico assinado. Os registos inválidos ou revogados não são apresentados como documentos válidos.

![A página pública de verificação de um histórico oficial válido, com os respetivos detalhes e cursos](../../.gitbook/assets/admin-transcript-verification.png)

Um histórico oficial é assinado digitalmente pelo Chamilo com a chave de assinatura da instituição. **Não é uma transação de blockchain**; a funcionalidade Sepolia documenta um processo distinto para as credenciais de certificados do livro de notas.

## Imagem da assinatura e dados do signatário

Um administrador da plataforma pode carregar uma imagem de assinatura **PNG ou JPEG** na secção **Assinatura dos históricos oficiais** da página de histórico de um formando. A imagem pertence ao URL de acesso atual e é utilizada nos PDFs oficiais. O nome e o cargo do signatário provêm de `certificate.transcript_signatory_name` e `certificate.transcript_signatory_title`.

Apenas os administradores da plataforma gerem a imagem da assinatura; os restantes emissores autorizados de históricos não obtêm esta permissão automaticamente. Proteja as chaves de assinatura da instituição e o armazenamento privado da imagem da assinatura no âmbito dos procedimentos de cópia de segurança e de controlo de acesso do portal. Ambos são mantidos fora da pasta web pública, em `var/certificate-issuer/`, juntamente com a chave que também assina as credenciais dos certificados do livro de notas: inclua esta pasta nas suas [cópias de segurança](../maintenance/backups.md), caso contrário todos os históricos e credenciais já emitidos deixam de poder ser verificados.

## Resolução de problemas

* **Ligação do histórico em falta:** verifique `certificate.transcript_enabled` e o âmbito do utilizador atual.
* **Sem cursos concluídos:** o formando necessita de um certificado qualificativo do livro de notas raiz e de uma inscrição correspondente no curso/sessão atual neste URL de acesso.
* **Número de estudante, horas, letras de classificação ou título do programa incorretos:** reveja as definições específicas `certificate.transcript_*` antes de emitir um histórico oficial.
* **A verificação indica um resultado revogado ou inválido:** não reutilize o registo como prova de um histórico oficial atual; o pessoal autorizado pode emitir um novo quando for adequado.

Consulte também [Certificados e competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) e [O meu histórico](../../student-guide/account-and-security/my-transcript.md).