# Profiling

This tool allows you to add extensions to the profile of all users. Each field created through this tool gives you a series of options:

* _Visibility_ allows you to decide whether the field must appear on the _extended profile_ page of the user \(so that he can see – and maybe update - it himself\)
* _Modifiable_ lets you decide if the field can be updated by the user himself, or if the admin will assign a specific value for this field for all users
* _Filter_ allows you to decide whether the field can be used as a filter and if it can be exported through exercises results exports
* _Order_ allows you to define an order of appearance of those fields, both in the application screens and in the CSV/XLS/XML exports. Note that not setting the field order can bring `title` vs `value` consistency issues in user exports.

Usually, you can create fields of which the user has no knowledge but which are useful administratively to organise or synchronise the system with other systems \(common unique identifier, for example\). Other fields are submitted to the user, like his date of birth, country, mother tongue, etc., which will later allow you to generate better statistics depending on the age, culture, previous knowledges, etc.

For users familiar with Drupal, this is equivalent to a mini CCK module for Chamilo.

![](../../.gitbook/assets/profil%20%283%29.png)Illustration 56: Administration – User profile fields list

| Icons | Features |
| :--- | :--- |
| ![](../../.gitbook/assets/graficos26%20%285%29.png)![](../../.gitbook/assets/graficos27%20%286%29.png) | Update/Delete field |
| ![](../../.gitbook/assets/images54%20%284%29.png)![](../../.gitbook/assets/images55%20%284%29.png) | Make modifiable / non modifiable or enable/disable filter |
| ![](../../.gitbook/assets/images56%20%284%29.png) | Organise the fields |
| ![](../../.gitbook/assets/images57%20%283%29.png)![](../../.gitbook/assets/images58%20%283%29.png) | Show/hide a field to the user |

Tableau 2: Administration – Profile fields management icons

