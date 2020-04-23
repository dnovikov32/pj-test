#!/usr/bin/env bash

# fix permissions
writable="app/backend/runtime
app/backend/web/assets
app/console/runtime
app/frontend/runtime
app/frontend/web/assets
yii
"

for path in ${writable}
do
    chmod 777 -R ${path}
done

# Install the application dependencies
composer install

# Run migrations
yes | php yii migrate