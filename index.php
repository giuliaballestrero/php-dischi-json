<!-- Descrizione
Dobbiamo creare una web-app che permetta di leggere una lista di dischi presente nel nostro server. Stack Html, CSS, VueJS (importato tramite CDN), axios, PHP
Consigli
Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.
Bonus
Al click su un disco, recuperare e mostrare i dati del disco selezionato.
2 file
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dischi Json</title>
    <!-- Bootstrap v5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.5/axios.min.js" integrity="sha512-JEXkqJItqNp0+qvX53ETuwTLoz/r1Tn5yTRnZWWz0ghMKM2WFCEYLdQnsdcYnryMNANMAnxNcBa/dN7wQtESdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vue 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- Custom css -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div id="app">
        <header class="mb-4">
            <nav class="navbar bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Spotify_icon.svg/991px-Spotify_icon.svg.png" alt="Spotify Logo" width="30" height="30">
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <div class="container d-flex justify-content-center">
                <div class="disk-container">


                    <div v-for="(disk, index) in diskList" :key="index" @click="getDetailDisk(index)" class="disk">
                        <img :src="disk.poster" :alt="disk.title" />
                        <h3>{{ disk.title }}</h3>
                        <span>{{ disk.author }}</span>
                    </div>

                </div>

                <div v-if="showDetailDisk" class="disk-details-container">
                    <div class="disk single-disk">
                        <img :src="singleDisk.poster" :alt="singleDisk.title" />
                        <span>{{ singleDisk.author }}</span>
                        <span>{{ singleDisk.genre }}</span>
                        <span>{{ singleDisk.year }}</span>
                        <div class="close-button-container">
                            <button @click="showDetailDisk = false" class="button close-button">X</button>
                        </div>
                    </div>
                </div>


            </div>
        </main>
    </div>
    <script src="./script.js" type="text/javascript"></script>
</body>

</html>