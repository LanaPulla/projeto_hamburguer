<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Burger</title>
  @vite('resources/js/app.js')
</head>
<body>
  <div id="burger-table-app">
    <pedidos :burgers='@json($burgers)'></pedidos>  {{-- componente Pedidos recebe os dados --}}
  </div>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>
<script>
  window.burgers = @json($burgers);
</script>
<style>

</style>
