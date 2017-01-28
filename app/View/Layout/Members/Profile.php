<minute-include-content></minute-include-content>

<div ng-controller="ProfileController as members" id="profileContainer">
    <minute-event name="import.members.profile.tabs" as="data.tabs"></minute-event>
</div>

<script>
    angular.bootstrap(document.getElementById("profileContainer"), ['ProfileApp']);
</script>
