# Verificação de certificado assinado

O Chamilo pode emitir **credenciais assinadas digitalmente** para certificados do livro de notas e, opcionalmente, ancorar uma impressão digital da credencial na **rede de testes Sepolia da Ethereum**. A assinatura e a página de verificação são distintas dos certificados PDF comuns.

## Habilitar credenciais assinadas

Em **Administração > Configurações de configuração > Certificados**, habilite `certificate.blockchain_verification_enabled` se a sua instituição pretender usar este recurso. Ele fica desabilitado por padrão. O portal deve usar HTTPS para emitir credenciais.

## O consentimento do estudante vem primeiro

O titular de um certificado abre **Meus certificados** e escolhe explicitamente **Aprovar publicação**. O consentimento abrange uma credencial publicamente verificável que mostra o nome do titular, o curso, a pontuação e a data de emissão e, opcionalmente, a impressão digital SHA-256 na Sepolia. A aprovação não é automática. O estudante pode, posteriormente, selecionar **Retirar consentimento**; a retirada afeta a validade exibida pela página de verificação, mas **não pode apagar uma impressão digital de blockchain já confirmada**.

## Emitir, verificar e revogar

Um administrador da plataforma autenticado diretamente pode usar a lista **Certificados** do livro de notas para emitir a credencial assinada depois que o titular tiver consentido. O link de verificação resultante usa `/certificates/verify/{token}`; uma resposta de verificação `.json` também está disponível. A página verifica a assinatura criptográfica, o consentimento, a revogação, a expiração e se as informações do certificado subjacente ainda correspondem à fonte assinada.

Se uma credencial for revogada, o consentimento for retirado, o certificado for alterado ou a assinatura for inválida, o verificador indica esse status em vez de informar uma credencial válida.

## Ancoragem opcional na Sepolia

Um administrador pode escolher **Ancorar na testnet Sepolia** usando uma carteira de navegador compatível ou **Confirmar transação existente na Sepolia** para reconciliar uma transação pendente. A carteira deve estar conectada à Sepolia (ID da cadeia `11155111`). A aplicação confirma a transação usando um **endpoint RPC HTTPS da Sepolia** configurado no servidor (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Nenhuma URL de RPC fornecida na requisição é aceita.

Somente a impressão digital da credencial é ancorada; dados pessoais não são enviados como dados da transação. A Sepolia é uma **testnet**. Seus registros e sua disponibilidade não devem ser apresentados como uma garantia de blockchain pública de nível de produção. Armazene as chaves da instituição e a configuração de RPC com segurança e planeje procedimentos de recuperação de chaves e de revogação de credenciais.

Implementação: [Verificação de credencial de certificado #9298](https://github.com/chamilo/chamilo-lms/pull/9298).