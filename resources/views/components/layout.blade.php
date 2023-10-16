<!DOCTYPE html>
<html lang="en">
<x-client_header/>
<body>
  <x-client_primary_nav />
  <x-client_secondary_nav />
{{ $slot }}
<x-client_footer />
</body>
<x-client_script />
</html>