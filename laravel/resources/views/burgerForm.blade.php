<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Burger</title>
  @vite('resources/js/app.js')
</head>
<body>
  <div id="burger-form-app"></div>  {{-- mount point para App.vue --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>

<style>

</style>
