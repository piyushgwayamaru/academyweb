<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
                .first-column{
            padding-top: 5px;
            border-radius: 20px;
            display: flex; 
            flex-direction: column;              /*to make the items inside this div stack vertically*/
            width: 300px;
            height: 670px;
            background: rgb(0, 0, 0)
        }
        .episode{
            color: rgb(146, 143, 143);
            text-align: left;
            padding-left:  10px;
            border-style: none;
            margin-top: 5px;
            margin-left: 15px;
            width: 90%;
            height: 35px;
            background-color: #171717;
            transition:  all 0.25s ease-in-out;
        }
        .first-column .episode:hover{
            background: #5A2E98;
            color: white;
        }
    </style>

</head> 
<body>
<div class="first-column">
    <frame type="get">
        <button class="episode" value="1" onclick="" true><pre>1     Akira of the death</pre></button>
        <button class="episode" value="2" onclick=""><pre>2     Bucket list of the death</pre></button>
    </frame>
</div>
</body>
</html>