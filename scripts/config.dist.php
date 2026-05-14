<?php
// Configuration for Chamilo documentation scripts.
// Copy this file to config.php and fill in your API key before use.

// Grok API key from https://console.x.ai/
$translationAPIKey = '{your_api_key}';

// API endpoint (default: Grok)
$translationAPIEndpoint = 'https://api.x.ai/v1/chat/completions';

// Model to use for translation.
// grok-3 gives the best quality for long-form text.
// grok-3-fast is cheaper and faster but slightly lower quality.
//$translationModel = 'grok-3';
$translationModel = 'grok-4-1-fast-non-reasoning';

// Source language (documentation is authored in English)
$translationSourceLanguageCode = 'en_US';
