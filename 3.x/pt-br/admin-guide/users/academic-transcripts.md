# Históricos acadêmicos

O Chamilo pode gerar um **histórico acadêmico não oficial** a partir dos cursos concluídos e certificados de um estudante e permitir que a equipe autorizada emita um **histórico oficial assinado**. Este recurso é distinto de um certificado individual de curso ou de sua verificação opcional na testnet Sepolia.

## Habilitar o recurso

Em **Administração > Configurações > Certificados**, habilite **Históricos acadêmicos** (`certificate.transcript_enabled`). Ele está desabilitado por padrão. Revise as configurações adicionais de programa, escala de notas, carga horária dos cursos, número do estudante, endereço e signatário em [Configurações de certificados](../platform-settings/certificate-settings.md#transcript_enabled).

O histórico utiliza certificados gerados pela **categoria raiz do livro de notas** dos cursos e sessões elegíveis. Ele inclui apenas cursos da URL de acesso atual nos quais o estudante ainda está inscrito. Um curso sem um certificado elegível não contribui com uma linha.

A nota final exibida é a média das pontuações percentuais dos cursos listados; o GPA é a média não ponderada dos pontos de nota mapeados. Ambos dependem dos cursos incluídos no momento da visualização ou da emissão.

## Colunas do histórico

| Coluna | Conteúdo |
|--------|---------|
| **Curso** | O código do curso ou o nome do departamento do curso (`transcript_course_code_source`) |
| **Descrição** | O título do curso e o título da sessão, no caso de um curso realizado em uma sessão |
| **Matrícula** | Quando o estudante se inscreveu no curso ou na sessão |
| **Horas exigidas** | O valor do campo extra do curso definido em `transcript_hours_extra_field` ou a duração do curso |
| **Data de conclusão** | A data do certificado |
| **Horas concluídas** | O tempo que o estudante passou no curso ou as horas exigidas quando `transcript_completed_hours_are_required_hours` está habilitado |
| **Nota final** | A pontuação do certificado |
| **Nota** | A letra de `transcript_grading_scale` correspondente a essa pontuação |

## Acessar o histórico de um estudante

1. Acesse **Administração > Usuários > Lista de usuários** e localize o estudante. Uma ação **Histórico** fica disponível para administradores autorizados e administradores de sessão quando o recurso está habilitado.
2. Como alternativa, use a ação **Histórico** na página de detalhes do relatório global de um estudante elegível.
3. Revise a lista de cursos, as notas, as datas, as horas, a nota final e o GPA do estudante.
4. Selecione **Baixar histórico não oficial** para obter um PDF gerado a partir dos registros atuais do estudante.

A página do histórico também está disponível diretamente em `/transcript?userId=<user-id>` para quem está autorizado a acessar os registros desse estudante. Não considere o conhecimento da URL ou do ID do usuário como permissão: o acesso é verificado no servidor.

Um estudante pode visualizar o **próprio** histórico, mas não pode emitir nem revogar um histórico oficial. Os emissores autorizados são:

* Administradores da plataforma/portal que atuam no escopo de usuários/URL de acesso que administram.
* Gestores de RH para os estudantes que acompanham.
* Administradores de sessão para estudantes inscritos em uma sessão que administram.

Essas permissões são avaliadas por estudante; ter um papel de equipe, por si só, não concede acesso a todos os históricos.

![O histórico de um estudante visto por um administrador, com os cursos, a nota final, o GPA e a escala de notas, a lista de históricos oficiais e o bloco da imagem de assinatura](../../.gitbook/assets/admin-transcript-user.png)

## Emitir e verificar um histórico oficial

1. Na página de histórico de um estudante autorizado, confira os cursos, as notas e as informações pessoais exibidos no momento.
2. Selecione **Emitir histórico oficial** e confirme. O Chamilo salva um instantâneo assinado das informações naquele momento.
3. A nova entrada aparece em **Históricos oficiais**, com a data de emissão e o emissor.
4. Use **Baixar** para o PDF oficial ou **Verificar** para abrir a página pública de verificação.
5. Se necessário, um emissor autorizado pode **Revogar** esse histórico oficial. A página de verificação informará, então, que ele foi revogado.

Cada histórico emitido é armazenado separadamente: emitir uma versão mais recente não reescreve silenciosamente um registro assinado anterior. Os links de verificação seguem `/transcripts/verify/<token>` e também expõem uma resposta `.json`. Quem possui o link de verificação pode conferir a validade sem fazer login; mantenha esses links adequadamente controlados, pois uma verificação válida expõe detalhes do histórico assinado. Registros inválidos ou revogados não são apresentados como documentos válidos.

![A página pública de verificação de um histórico oficial válido, com seus detalhes e cursos](../../.gitbook/assets/admin-transcript-verification.png)

Um histórico oficial é assinado digitalmente pelo Chamilo usando a chave de assinatura da instituição. **Não se trata de uma transação em blockchain**; o recurso Sepolia documenta um processo separado para as credenciais de certificado do livro de notas.

## Imagem de assinatura e dados do signatário

Um administrador da plataforma pode carregar uma imagem de assinatura **PNG ou JPEG** na seção **Assinatura de históricos oficiais** da página de histórico de um aprendiz. A imagem pertence à URL de acesso atual e é usada em PDFs oficiais. O nome e o cargo do signatário provêm de `certificate.transcript_signatory_name` e `certificate.transcript_signatory_title`.

Somente os administradores da plataforma gerenciam a imagem de assinatura; outros emissores autorizados de históricos não obtêm essa permissão automaticamente. Proteja as chaves de assinatura da instituição e o armazenamento privado da imagem de assinatura como parte dos procedimentos de backup e controle de acesso do portal. Ambos são mantidos fora da pasta web pública, em `var/certificate-issuer/`, com a chave que também assina as credenciais de certificados do livro de notas: inclua esta pasta em seus [backups](../maintenance/backups.md), ou todos os históricos e credenciais já emitidos não poderão mais ser verificados.

## Solução de problemas

* **Link do histórico ausente:** verifique `certificate.transcript_enabled` e o escopo do usuário atual.
* **Nenhum curso concluído:** o aprendiz precisa de um certificado qualificado do livro de notas raiz e de uma matrícula correspondente no curso/sessão atual nesta URL de acesso.
* **Número de estudante, horas, letras de nota ou título do programa incorretos:** revise as configurações específicas `certificate.transcript_*` antes de emitir um histórico oficial.
* **A verificação informa um resultado revogado ou inválido:** não reutilize o registro como comprovação de um histórico oficial atual; a equipe autorizada pode emitir um novo quando apropriado.

Consulte também [Certificados e competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) e [Meu histórico](../../student-guide/account-and-security/my-transcript.md).