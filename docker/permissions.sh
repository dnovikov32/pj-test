#!/usr/bin/env sh

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


