# Exportação segura de diagnóstico de configuração

O Chamilo 3.1 fornece um relatório JSON para download destinado a diagnosticar problemas de configuração sem exportar intencionalmente valores confidenciais de configurações. O relatório limita-se à **URL de acesso atual** e exige um perfil de administrador.

## Baixar o relatório

1. Abra **Administração > Configurações** no portal que deseja inspecionar.
2. Selecione **Baixar configuração para depuração**.
3. Salve com segurança o arquivo gerado `chamilo-configuration-dump.json`.
4. **Revise o arquivo inteiro antes de enviá-lo a qualquer pessoa**, mesmo que pareça ter sido sanitizado.

O relatório inclui um carimbo de data e hora da exportação, o escopo da URL de acesso, configurações sanitizadas da plataforma e o estado de instalação/ativação dos plugins, além da configuração sanitizada dos plugins. Trata-se de uma exportação somente leitura; baixá-la não altera as configurações do sistema.

## Confidencialidade e limites da URL de acesso

Valores sensíveis são ocultados pela camada de sanitização. As configurações de plugins são tratadas como confidenciais por padrão, a menos que sejam explicitamente classificadas para exportação segura. Ainda assim, nomes de configurações, nomes de plugins e outros metadados de diagnóstico podem revelar detalhes de implementação; portanto, distribua o arquivo apenas a pessoal de suporte de confiança.

Em instalações com múltiplas URLs, o backend verifica se a URL de acesso resolvida corresponde ao host da requisição, em vez de exportar silenciosamente a configuração de outro portal. Confirme o endereço do portal antes de baixar.

## Solução de problemas

Se a exportação não estiver disponível, verifique se a conta possui privilégios de administrador e se o portal solicitado resolve para a sua própria URL de acesso. Revise os logs do servidor web e da aplicação sem copiar credenciais ou informações pessoais para chamados de suporte.

Consulte [Ferramentas do sistema](system-tools.md) e [Configurações de segurança](../platform-settings/security-settings.md). Implementação: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).