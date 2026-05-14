# Videoconferência

O Chamilo integra-se com plataformas de videoconferência para possibilitar sessões ao vivo dentro dos cursos.

## Plataformas Suportadas

### BigBlueButton

**BigBlueButton** (BBB) é um sistema de conferência web de código aberto projetado para aprendizagem online. É a solução de videoconferência mais comumente usada com o Chamilo.

#### Configuração

1. Instale o BigBlueButton em um servidor separado (consulte a [documentação do BigBlueButton](https://docs.bigbluebutton.org/))
2. Use o comando bbb-conf --salt no servidor BBB para obter os detalhes de integração
3. Nas configurações da plataforma Chamilo, em **Plugins**, instale o plugin de Videoconferência e insira suas configurações para definir:
   * **URL do servidor BBB** — O endereço do seu servidor BBB
   * **Salt/secret do BBB** — O segredo da API do seu servidor BBB
4. Salve
5. **Ative** o plugin de Videoconferência
6. Algumas funcionalidades especiais estão disponíveis para administradores, então certifique-se de habilitá-lo na região *admin_page*

#### Funcionalidades Disponíveis no Chamilo

* Iniciar/participar de reuniões diretamente de um curso
* Criação automática de salas por curso
* Gravações de reuniões (se habilitado)
* Compartilhamento de tela, quadro branco, salas de breakout
* Chat ao lado do vídeo

### Zoom

O Chamilo também pode se integrar ao **Zoom** para videoconferências.

#### Configuração

1. Crie um aplicativo Zoom no Zoom Marketplace
2. No Chamilo, configure as credenciais da API do Zoom
3. Ative a integração com o Zoom

#### Como Funciona

Quando o Zoom está configurado, os professores podem criar e iniciar reuniões do Zoom diretamente de seus cursos. Os alunos participam através da interface do Chamilo.

## Escolhendo entre BBB e Zoom

| Funcionalidade | BigBlueButton | Zoom |
|---------------|--------------|------|
| Custo | Gratuito (código aberto), mas requer seu próprio servidor | Requer uma assinatura do Zoom |
| Hospedagem | Auto-hospedado | Hospedado na nuvem pelo Zoom |
| Profundidade de integração | Profunda (desenvolvido para uso em LMS) | Padrão |
| Gravação | Lado do servidor, armazenado na sua infraestrutura | Nuvem do Zoom ou local |
| Quadro branco | Integrado | Integrado |
| Salas de breakout | Sim | Sim |

## Dicas

* **Servidor separado para BBB** — O BigBlueButton deve rodar em um servidor dedicado próprio para melhor desempenho, não no mesmo servidor que o Chamilo
* **Teste antes das aulas** — Sempre teste a configuração de videoconferência antes de uma sessão ao vivo
* **Verifique a largura de banda** — Certifique-se de que seu servidor e rede podem suportar o número esperado de usuários simultâneos