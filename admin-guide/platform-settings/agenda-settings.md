# Paramètres de l’agenda

Valeurs par défaut et comportement de l’outil **Agenda** (calendrier / événements).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Agenda**. Cette catégorie contient **11 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour les scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `agenda_colors`

**Couleurs de l’agenda**

Définissez des couleurs en code HTML pour chaque type d’événement afin de modifier la couleur d’affichage de l’événement.

### `agenda_legend`

**Légendes des couleurs de l’agenda**

Ajoutez un court texte de légende décrivant les couleurs utilisées pour les événements.

### `agenda_on_hover_info`

**Informations au survol de l’agenda**

Personnalisez l’agenda au survol du curseur. Affichez le commentaire et/ou la description de l’agenda.

### `agenda_reminders_sender_id`

**ID de l’utilisateur qui envoie officiellement les rappels d’agenda**

Définit quel utilisateur apparaît comme expéditeur des e-mails de rappel d’agenda.

*Par défaut : `0`*

### `allow_agenda_edit_for_hrm`

**Autoriser le rôle HRM à modifier ou supprimer des événements d’agenda**

Cela donne un peu plus de pouvoir au HRM en lui permettant de modifier/supprimer des événements d’agenda dans la session de cours.

*Par défaut : `false`*

### `allow_careers_in_global_agenda`

**Lier les événements du calendrier global aux filières et promotions**

Lorsqu’il est activé, les événements du calendrier global peuvent être associés aux filières et aux promotions, ce qui permet une planification ciblée.

*Par défaut : `false`*

### `allow_personal_agenda`

**Agenda personnel**

L’apprenant peut-il ajouter des événements personnels à l’agenda ?

*Par défaut : `true`*

### `default_calendar_view`

**Mode d’affichage par défaut du calendrier**

Définissez cette valeur sur dayGridMonth, basicWeek, agendaWeek ou agendaDay pour modifier la vue par défaut du calendrier.

*Par défaut : `month`*

### `fullcalendar_settings`

**Personnalisation du calendrier**

Paramètres supplémentaires pour l’agenda, vous permettant de configurer la bibliothèque de calendrier spécifique que nous utilisons.

### `personal_agenda_show_all_session_events`

**Afficher tous les événements d’agenda dans l’agenda personnel**

Ne pas masquer les événements des sessions expirées.

*Par défaut : `false`*

### `personal_calendar_show_sessions_occupation`

**Afficher les occupations des sessions dans l’agenda personnel**

Lorsqu’il est activé, les horaires et occupations des sessions sont affichés dans les calendriers personnels des utilisateurs.

*Par défaut : `false`*