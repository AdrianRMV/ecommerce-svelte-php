<script>
    import { onMount } from 'svelte';

    var myHeaders = new Headers();
    myHeaders.append(
        'Authorization',
        'Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf'
    );

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow',
    };

</script>

<main>
    <div id="table" />
</main>
