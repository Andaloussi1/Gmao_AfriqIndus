<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users Report</title>

</head>
<body>
<style>
    table, th, td {
        text-align:center;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<h5>
   AfriqIndus
</h5>



<table style="width: 100%">
    <thead>
    <tr>

        <th >
            <strong>Nom</strong>
        </th>
        <th >
            <strong>Reeference</strong>
        </th>
        <th >
            <strong>Marque</strong>
        </th>
        <th >
            <strong>Type</strong>
        </th>
        <th >
            <strong>Designation</strong>
        </th>


    </tr>
    </thead>
    <tbody>
    @foreach ($articles as $art)
        <tr>

            <td >
                {{$art->nom}}
            </td>
            <td >
                {{$art->reference}}
            </td>
            <td >
                {{$art->marque}}
            </td>
            <td >
                {{$art->type}}
            </td>
            <td >
                {{$art->designation}}
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
<br>
<br>
<table style="width: 100%">
    <thead>
    <tr>


        <th >
            <strong>Stock Initial</strong>
        </th>
        <th >
            <strong>Quantité</strong>
        </th>
        <th >
            <strong>Emplacement</strong>
        </th>

        <th >
            <strong>Prix d'achat</strong>
        </th>
        <th >
            <strong>Prix de vente</strong>
        </th>

        <th >

            <strong>Total</strong>
        </th>

        <th>
            <strong>Total HTVA</strong>
        </th>

    </tr>
    </thead>
    <tbody>
    @foreach ($articles as $art)
        <tr>

            <td >
                {{$art->stockInit}}
            </td>
            <td >
                {{$art->niveauStock}}
            </td>
            <td >
                {{$art->location}}
            </td>
            <td >
                {{$art->prixAchat}}
            </td>
            <td >
                {{$art->prixVente}}
            </td>
            <td >
                {{$art->prixVente * $art->niveauStock}}
            </td>
            <td >
                {{$art->totalHTVA}}
            </td>


        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

<script>

</script>

