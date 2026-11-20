# Verificação de certificados assinados

O Chamilo pode emitir **credenciais assinadas digitalmente** para certificados do livro de notas e, opcionalmente, ancorar uma impressão digital da credencial na **rede de testes Sepolia da Ethereum**. A página de assinatura e verificação é distinta dos certificados PDF comuns.

## Ativar credenciais assinadas

Em **Administração > Definições de configuração > Certificados**, ative `certificate.blockchain_verification_enabled` se a sua instituição pretender utilizar esta funcionalidade. Está desativada por predefinição. O portal deve utilizar HTTPS para emitir credenciais.

## O consentimento do formando vem em primeiro lugar

O titular de um certificado abre **Os meus certificados** e escolhe explicitamente **Aprovar publicação**. O consentimento abrange uma credencial publicamente verificável que apresenta o nome do titular, o curso, a pontuação e a data de emissão e, opcionalmente, a impressão digital SHA-256 na Sepolia. A aprovação não é automática. O formando pode posteriormente selecionar **Retirar consentimento**; a retirada afeta a validade apresentada pela página de verificação, mas **não pode apagar uma impressão digital de blockchain já confirmada**.

## Emitir, verificar e revogar

Um administrador da plataforma autenticado diretamente pode utilizar a lista **Certificados** do livro de notas para emitir a credencial assinada depois de o titular ter dado o seu consentimento. A ligação de verificação resultante utiliza `/certificates/verify/{token}`; também está disponível uma resposta de verificação `.json`. A página verifica a assinatura criptográfica, o consentimento, a revogação, a expiração e se as informações subjacentes do certificado ainda correspondem à origem assinada.

Se uma credencial for revogada, o consentimento for retirado, o certificado for alterado ou a assinatura for inválida, o verificador indica esse estado em vez de comunicar uma credencial válida.

## Ancoragem opcional na Sepolia

Um administrador pode escolher **Ancorar na rede de testes Sepolia** utilizando uma carteira de navegador suportada ou **Confirmar transação Sepolia existente** para reconciliar uma transação pendente. A carteira deve estar ligada à Sepolia (ID da cadeia `11155111`). A aplicação confirma a transação através de um **ponto de extremidade RPC HTTPS da Sepolia** configurado no servidor (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Não é aceite qualquer URL de RPC fornecida no pedido.

Apenas a impressão digital da credencial é ancorada; os dados pessoais não são submetidos como dados da transação. A Sepolia é uma **rede de testes**. Os seus registos e a sua disponibilidade não devem ser apresentados como uma garantia de blockchain pública de nível de produção. Armazene as chaves da instituição e a configuração RPC de forma segura e planeie procedimentos de recuperação de chaves e de revogação de credenciais.

Implementação: [Verificação de credenciais de certificados #9298](https://github.com/chamilo/chamilo-lms/pull/9298).