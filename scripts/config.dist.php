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
$translationModel = 'grok-4.6';

// If you switch $translationModel to a reasoning-capable model (e.g. grok-4.6),
// know that it defaults to reasoning_effort=high (~30-45s time-to-first-token),
// which can make chunk requests hit the cURL timeout below. "low" is enough
// for translating documentation prose. Set to '' to omit the parameter entirely
// (e.g. for models that reject it).
$translationReasoningEffort = 'low';

// cURL timeout (seconds) per API request. Raised well above PHP's 30s default
// to give reasoning models room to respond; has a 30s floor.
$translationTimeoutSeconds = 180;

// Target size (bytes) for each API request chunk. Pages are split at heading
// boundaries and greedily batched up to this size (see splitIntoChunks()).
$translationChunkTarget = 5_000;

// Source language (documentation is authored in English)
$translationSourceLanguageCode = 'en_US';
