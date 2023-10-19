<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
     <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
     <!-- end: Icons -->
    @vite([
        'resources/js/app.js',
        'resources/css/app.css',
    ])
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
