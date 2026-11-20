# Emissão e verificação de Open Badges 2.0

O Chamilo 3.1 pode publicar credenciais **Open Badges 2.0** para competências adquiridas, incluindo uma imagem de distintivo que carrega uma assertion incorporada nos metadados PNG. A verificação do distintivo utiliza endpoints públicos de distintivo, assertion e emissor.

## Configurar o emissor e as competências

1. Defina o **nome da instituição** da plataforma e um **e-mail de contato do administrador** válido; ambos são exigidos pelo perfil do emissor.
2. Configure a competência com título, descrição e critérios do distintivo.
3. Anexe uma imagem PNG válida do distintivo, quando apropriado. O Chamilo também pode usar sua imagem de distintivo padrão se a competência não tiver um recurso personalizado.
4. Conceda ou valide a aquisição da competência para o estudante pelo fluxo normal de competências.

As credenciais dependem da relação de competência adquirida. Uma assertion de competência revogada ou que não está mais adquirida é reportada como revogada. Os recursos de competência e distintivo ficam restritos à URL de acesso apropriada.

## Dados públicos de verificação

Cada emissão possui uma assertion hospedada. As URLs relacionadas são derivadas da raiz pública da aplicação e incluem:

- `main/skills/assertion.php?issue=<issue-id>` — assertion JSON de uma emissão específica de competência.
- `main/skills/class.php?id=<skill-id>` — metadados da classe do distintivo, incluindo critérios e referência do emissor.
- `main/skills/issuer.php` — perfil da instituição emissora.
- `main/skills/image.php?id=<skill-id>` — recurso de imagem do distintivo.

As URLs geradas exatas dependem do caminho base público da instalação. A assertion inclui um hash com salt do e-mail do destinatário em vez de publicar o endereço de e-mail em texto simples, e identifica o emissor e a competência adquirida. O PNG do distintivo pode incluir a assertion em um chunk iTXt `openbadges`.

## Validar um distintivo emitido

Abra os endpoints hospedados de assertion, classe do distintivo e emissor sem uma sessão autenticada. Eles devem retornar uma credencial vinculada e consistente. Baixe o PNG emitido pelo fluxo de exportação suportado da competência e verifique se a assertion incorporada corresponde à representação hospedada. Se a competência for revogada, confira se a verificação reflete o estado revogado.

Um PNG apenas com a arte visual do distintivo **não** comprova uma credencial válida. Não confunda a emissão de Open Badges 2.0 com funcionalidades não relacionadas de certificado ou PDF assinado.

Consulte [Gerenciamento de competências](managing-skills.md) e [Verificação de certificado assinado](../maintenance/signed-certificate-verification.md). Implementação: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).