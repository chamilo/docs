# Gerenciando Salas

Salas no Chamilo são organizadas sob filiais: uma filial é um local físico, e cada sala pertence a exatamente uma filial.

## Filiais

**Salas > Filiais** gerencia os locais físicos da sua organização — um prédio, campus ou escritório. As filiais podem ser aninhadas (uma filial pode ter filiais filhas), de modo que você pode modelar algo como "Campus Principal > Prédio A."

Campos que você pode definir para uma filial:

* **Título** e **Descrição**
* **Filial pai** — Para organizar filiais hierarquicamente
* **Endereço IP** — Opcional, para identificação baseada em rede
* **Latitude / Longitude** — Para mapeamento
* **Velocidade de download / upload** e **Atraso** — Metadados opcionais de qualidade de rede
* **E-mail, nome e telefone do administrador** — Dados de contato de quem gerencia aquele local

## Salas

**Salas > Salas** gerencia os espaços efetivamente reserváveis dentro de uma filial — tipicamente uma sala de aula ou sala de treinamento. Toda sala deve pertencer a uma filial.

Campos que você pode definir para uma sala:

* **Título** e **Descrição**
* **Filial** — A qual filial esta sala pertence (obrigatório)
* **Número do andar**
* **Capacidade** — Deve ser um número positivo
* **Geolocalização**, **endereço IP** e **máscara IP** — Campos avançados opcionais

Cada sala também possui uma visualização de calendário de "Ocupação" que mostra suas reservas, e uma contagem dos cursos que a utilizam.

## Relacionado

Para encontrar uma sala livre em um intervalo de horário específico em vez de percorrer a lista, consulte [Localizador de Disponibilidade de Salas](room-availability-finder.md).