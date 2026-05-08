#!/usr/bin/env bash
set -euo pipefail

# ── Deployment script ────────────────────────────────────────────────────────
# Run this on the server after pulling the latest code.

echo "→ Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "→ Installing JS dependencies and building assets..."
npm ci --no-audit
npm run build

echo "→ Running database migrations..."
php artisan migrate --force --no-interaction

echo "→ Warming Laravel caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo "→ Restarting queue workers..."
php artisan queue:restart

echo "✓ Deployment complete."
