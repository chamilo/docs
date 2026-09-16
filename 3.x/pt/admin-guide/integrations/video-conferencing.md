# Videoconferência

O Chamilo integra-se com plataformas de videoconferência para permitir sessões ao vivo dentro dos cursos.

## Plataformas suportadas

### BigBlueButton

O **BigBlueButton** (BBB) é um sistema de webconferência de código aberto concebido para a aprendizagem em linha. É a solução de videoconferência mais comummente utilizada com o Chamilo.

#### Configuração

1. Instale o BigBlueButton num servidor separado (consulte a [documentação do BigBlueButton](https://docs.bigbluebutton.org/))
2. Utilize bbb-conf --salt no servidor BBB para obter os detalhes de integração
3. Nas definições da plataforma Chamilo, **Plugins**, instale o plugin Videoconference e introduza a respetiva configuração para definir:
   * **BBB server URL** — O endereço do seu servidor BBB
   * **BBB salt/secret** — O segredo da API do seu servidor BBB
4. Guarde
5. **Ative** o plugin Videoconference
6. Algumas funcionalidades especiais estão disponíveis para administradores, por isso certifique-se de que o ativa na região *admin_page*

#### Funcionalidades disponíveis no Chamilo

* Iniciar/entrar em reuniões a partir de um curso
* Criação automática de salas por curso
* Gravações de reuniões (se ativadas)
* Partilha de ecrã, quadro branco, salas de grupo
* Chat em paralelo com o vídeo

### Zoom

O Chamilo também pode integrar-se com o **Zoom** para videoconferência.

#### Configuração

1. Crie uma aplicação Zoom no Zoom Marketplace
2. No Chamilo, configure as credenciais da API do Zoom
3. Ative a integração Zoom

#### Como funciona

Quando o Zoom está configurado, os professores podem criar e iniciar reuniões Zoom a partir do seu curso. Os formandos entram através da interface do Chamilo.

## Escolher entre BBB e Zoom

| Funcionalidade | BigBlueButton | Zoom |
|---------|--------------|------|
| Custo | Gratuito (código aberto), mas requer o seu próprio servidor | Requer uma subscrição Zoom |
| Alojamento | Autohospedado | Alojamento na nuvem pelo Zoom |
| Profundidade da integração | Profunda (concebida para utilização em LMS) | Padrão |
| Gravação | No servidor, armazenada na sua infraestrutura | Nuvem Zoom ou local |
| Quadro branco | Integrado | Integrado |
| Salas de grupo | Sim | Sim |

## Dicas

* **Servidor separado para o BBB** — O BigBlueButton deve ser executado num servidor dedicado próprio para melhor desempenho, e não no mesmo servidor que o Chamilo
* **Teste antes das aulas** — Teste sempre a configuração de videoconferência antes de uma sessão ao vivo
* **Verifique a largura de banda** — Assegure-se de que o servidor e a rede conseguem suportar o número esperado de utilizadores simultâneos