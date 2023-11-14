<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #top {
            background-color: #333;
            margin-bottom: 1rem;
        }

        #nav-item-container {
            padding: 1.5rem 0 1.5rem 2rem;
            margin: 0 auto;
        }

        #nav-ul {
            display: flex;
            justify-content: space-between;
            width: 35%;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #nav-ul li {
            display: inline-block;
            margin-right: 20px; /* Adjust as needed for spacing */
        }

        #nav-ul li a {
            text-decoration: none;
            color: white;
            font-size: 2rem;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #nav-ul li a:hover {
            color: #dcdcdc;
        }

        .zoom {
            transition: transform .3s;
        }

        .zoom:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <nav id="top">
        <div id="nav-item-container">
            <ul id="nav-ul">
                <li class="zoom"><a id="admin-link" href="//ÄNDRA TILL RÄTT ID">Admin</a></li>
                <li class="zoom"><a id="product-link" href="//ÄNDRA TILL RÄTT ID">Produkt</a></li>
                <li class="zoom"><a id="report-link" href="//ÄNDRA TILL RÄTT ID">Rapport</a></li>
                <li class="zoom"><a id="checkout-link" href="//ÄNDRA TILL RÄTT ID">Kassa</a></li>
            </ul>
        </div>
    </nav>
</body>

</html>
