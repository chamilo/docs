# Emissão e verificação de Open Badges 2.0

O Chamilo 3.1 pode publicar credenciais **Open Badges 2.0** para competências adquiridas, incluindo uma imagem de insígnia que contém uma asserção incorporada (baked assertion) nos metadados PNG. A verificação das insígnias utiliza endpoints públicos de insígnia, asserção e emissor.

## Configurar o emissor e as competências

1. Defina o **nome da instituição** da plataforma e um **e-mail de contacto do administrador** válido; ambos são exigidos pelo perfil do emissor.
2. Configure a competência com um título, uma descrição e critérios da insígnia.
3. Anexe uma imagem PNG de insígnia válida, quando apropriado. O Chamilo também pode utilizar a sua imagem de insígnia predefinida se a competência não tiver um recurso personalizado.
4. Atribua ou valide a aquisição da competência pelo estudante através do fluxo normal de competências.

As credenciais dependem da relação de competência adquirida. Uma asserção de competência revogada ou que já não se encontra adquirida é comunicada como revogada. Os recursos de competência e de insígnia estão associados ao URL de acesso adequado.

## Dados públicos de verificação

Cada emissão dispõe de uma asserção alojada. Os URL relacionados derivam da raiz pública da aplicação e incluem:

- `main/skills/assertion.php?issue=<issue-id>` — asserção JSON de uma emissão específica de competência.
- `main/skills/class.php?id=<skill-id>` — metadados da classe de insígnia, incluindo critérios e referência do emissor.
- `main/skills/issuer.php` — perfil da instituição emissora.
- `main/skills/image.php?id=<skill-id>` — recurso de imagem da insígnia.

Os URL gerados exatos dependem do caminho base público da instalação. A asserção inclui um hash com salt do e-mail do destinatário, em vez de publicar o endereço de e-mail em claro, e identifica o emissor e a competência adquirida. O PNG da insígnia pode incluir a asserção num chunk iTXt `openbadges`.

## Validar uma insígnia emitida

Abra os endpoints da asserção alojada, da classe de insígnia e do emissor sem uma sessão autenticada. Devem devolver uma credencial ligada de forma consistente. Descarregue o PNG emitido através do fluxo de exportação suportado da competência e verifique se a asserção incorporada corresponde à representação alojada. Se a competência for revogada, confirme que a verificação reflete o seu estado revogado.

Um PNG apenas com a arte visual da insígnia **não** prova uma credencial válida. Não confunda a emissão de Open Badges 2.0 com funcionalidades não relacionadas de certificados ou de PDF assinado.

Consulte [Gestão de competências](managing-skills.md) e [Verificação de certificados assinados](../maintenance/signed-certificate-verification.md). Implementação: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).