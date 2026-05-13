---
# Paramètres de l'Agenda

Valeurs par défaut et comportement de l'outil **Agenda** (calendrier / événements).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Agenda**. Cette catégorie contient **11 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `agenda_colors`

**Couleurs de l'agenda**

Définissez les couleurs en code HTML pour chaque type d'événement afin de modifier la couleur lors de l'affichage de l'événement.

### `agenda_legend`

**Légendes des couleurs de l'agenda**

Ajoutez un petit texte en tant que légende décrivant les couleurs utilisées pour les événements.

### `agenda_on_hover_info`

**Informations au survol de l'agenda**

Personnalisez l'agenda lors du survol du curseur. Affichez le commentaire et/ou la description de l'agenda.

### `agenda_reminders_sender_id`

**ID de l'utilisateur qui envoie officiellement les rappels d'agenda**

Définit quel utilisateur apparaît comme l'expéditeur des e-mails de rappel d'agenda.

*Valeur par défaut : `0`*

### `allow_agenda_edit_for_hrm`

**Autoriser le rôle HRM à modifier ou supprimer des événements d'agenda**

Cela donne un peu plus de pouvoir au HRM en lui permettant de modifier/supprimer des événements d'agenda dans le cours-session.

*Valeur par défaut : `false`*

### `allow_careers_in_global_agenda`

**Lier les événements du calendrier global aux carrières et promotions**

Lorsqu'activé, les événements du calendrier global peuvent être associés aux carrières et promotions, permettant une planification ciblée.

*Valeur par défaut : `false`*

### `allow_personal_agenda`

**Agenda personnel**

L'apprenant peut-il ajouter des événements personnels à l'Agenda ?

*Valeur par défaut : `true`*

### `default_calendar_view`

**Mode d'affichage par défaut du calendrier**

Définissez ceci sur dayGridMonth, basicWeek, agendaWeek ou agendaDay pour changer la vue par défaut du calendrier.

*Valeur par défaut : `month`*

### `fullcalendar_settings`

**Personnalisation du calendrier**

Paramètres supplémentaires pour l'agenda, vous permettant de configurer la bibliothèque de calendrier spécifique que nous utilisons.

### `personal_agenda_show_all_session_events`

**Afficher tous les événements d'agenda dans l'agenda personnel**

Ne pas masquer les événements des sessions expirées.

*Valeur par défaut : `false`*

### `personal_calendar_show_sessions_occupation`

**Afficher les occupations des sessions dans l'agenda personnel**

Lorsqu'activé, les horaires et occupations des sessions sont affichés dans les calendriers personnels des utilisateurs.

*Valeur par défaut : `false`*