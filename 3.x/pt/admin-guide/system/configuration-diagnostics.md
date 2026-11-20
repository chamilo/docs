# Exportação segura de diagnóstico de configuração

O Chamilo 3.1 disponibiliza um relatório JSON descarregável para diagnosticar problemas de configuração sem exportar intencionalmente valores confidenciais de definições. O relatório limita-se ao **URL de acesso atual** e requer uma função de administrador.

## Descarregar o relatório

1. Abra **Administração > Definições** no portal que pretende inspecionar.
2. Selecione **Descarregar configuração para depuração**.
3. Guarde de forma segura o ficheiro `chamilo-configuration-dump.json` gerado.
4. **Reveja o ficheiro completo antes de o enviar a quem quer que seja**, mesmo que pareça ter sido sanitizado.

O relatório inclui um carimbo de data/hora de exportação, o âmbito do URL de acesso, definições da plataforma sanitizadas e o estado de instalação/ativação dos plugins, bem como a configuração sanitizada dos plugins. Trata-se de uma exportação só de leitura; descarregá-la não altera as definições do sistema.

## Confidencialidade e limites do URL de acesso

Os valores sensíveis são ocultados pela camada de sanitização. As definições dos plugins são tratadas como confidenciais por predefinição, salvo se forem explicitamente classificadas para exportação segura. Ainda assim, os nomes das definições, os nomes dos plugins e outros metadados de diagnóstico podem revelar pormenores de implementação, pelo que deve distribuir o ficheiro apenas a pessoal de suporte de confiança.

Em instalações com vários URLs, o backend verifica se o URL de acesso resolvido corresponde ao anfitrião do pedido, em vez de exportar silenciosamente a configuração de outro portal. Confirme o endereço do portal antes de descarregar.

## Resolução de problemas

Se a exportação não estiver disponível, certifique-se de que a conta tem privilégios de administrador e de que o portal solicitado resolve para o seu próprio URL de acesso. Reveja os registos do servidor web e da aplicação sem copiar credenciais ou informações pessoais para os pedidos de suporte.

Consulte [Ferramentas do sistema](system-tools.md) e [Definições de segurança](../platform-settings/security-settings.md). Implementação: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).