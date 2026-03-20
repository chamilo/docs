# Color Themes

Chamilo 2.0 uses a database-driven color theme system that can be customized per access URL.

## How Themes Work

Themes are managed through the `AccessUrlRelColorTheme` entity, which associates a color theme with an access URL. This allows multi-URL installations to have different visual identities.

## Theme Structure

A color theme defines CSS custom properties (variables) that control:

* Primary and secondary colors
* Background colors
* Text colors
* Accent colors
* Component-specific colors

These variables are applied globally and cascade through PrimeVue components and Tailwind utilities.

## Applying a Theme

Themes are selected through the administration panel under the branding section. The selected theme's CSS variables are injected into the page, overriding the defaults.

## Creating a Custom Theme

To create a new theme:

1. Define your color palette as CSS custom properties
2. Register the theme in the database
3. Associate it with an access URL

The theme system is designed to work with PrimeVue's theming capabilities, so custom themes automatically affect all PrimeVue components used in the frontend.
