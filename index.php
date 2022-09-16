<?php

//Exercice 1

function factorielle($nbr)
{
    if ($nbr === 0) // condition d'arret
        return 1;
    else
        return $nbr * factorielle($nbr - 1);
}

//echo factorielle(5);

/*************************************************************/

//Exercice 2

function bubble_sort($arr)
{
    $size = count($arr) - 1;
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size - $i; $j++) {
            $k = $j + 1;
            if ($arr[$k] < $arr[$j]) {
                // Swap elements at indices: $j, $k
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
    }
    return $arr;
}

$tab = [120, 40, 45, 12, 9, 4, 14, 170, 100, 131, 99];
$newtab = bubble_sort($tab);

//var_dump($newtab);

/*************************************************************/

//Exercice 3
$treeArray = [[4, 'infos', 'aled'], [10, 16, 4], [2], [25, 10, 5], [12], [12, 14]];
$newArray = [];

function formatTreeArray($treeArray, $newArray)
{
    $len = count($treeArray);
    for ($i = 0; $i < $len; $i++) {
        if (is_array($treeArray[$i])) {
            $newArray = formatTreeArray($treeArray[$i], $newArray);
        } else {
            $newArray[] = $treeArray[$i];
        }
    }
    return $newArray;
}

var_dump(formatTreeArray($treeArray, $newArray));

/*****************************************************************/

?>

<!-- Trouver l'élément le plus fréquent d'un tableau donnée -->

<script>
    let arrayElement = ['a', 1, 12, 'a', 'b', 12, 1, 'a', 'b', 'a'];
    console.log(mode(arrayElement));

    function mode(array) {
        if (array.length === 0)
            return null;
        let modeMap = {};
        let maxEl = array[0], maxCount = 1;
        for (let i = 0; i < array.length; i++) {
            let el = array[i];
            if (modeMap[el] == null)
                modeMap[el] = 1;
            else
                modeMap[el]++;
            if (modeMap[el] > maxCount) {
                maxEl = el;
                maxCount = modeMap[el];
            }
        }
        return maxEl;
    }

    let phrase = "Crois moi mon expérience de bourlingueur ."

    function findLongestWord(str) {
        let strSplit = str.split(' ');
        let longestWord = 0;
        let longestWordStr = "";
        for (let i = 0; i < strSplit.length; i++) {
            if (strSplit[i].length > longestWord) {
                longestWord = strSplit[i].length;
                longestWordStr = strSplit[i];
            }
        }
        return longestWordStr;
    }

    console.log(findLongestWord(phrase));


    function shellSort(array) {
        // Notre écart
        var gap = Math.floor(array.length / 2);
        // Tant que notre écart est supérieur à zéro
        while (gap > 0) {
            console.log(gap);
            for (i = gap; i < array.length; i++) {
                console.log(array);
                var j = i;
                // On stock temporairement la valeur dans une variable pour le potentiel swap
                var temp = array[i];
                // SWAPPING SI...
                while (array[j - gap] > temp) {
                    array[j] = array[j - gap];
                    j = j - gap;
                }
                array[j] = temp;
            }
            // 4, puis 2, puis 1, puis 0.5... Arrondi à l'entier inférieur (pour sortir de la boucle WHILE)
            gap = Math.floor(gap / 2);
            console.log("--final step--");
            console.log(array);
        }
        return array;
    }

    console.log(shellSort([3, 0, 2, 5, 10, 2, 4, 1, 9, 7, 8, 6, 5, 9, 10, 23, 20, 13, 14, 3, 0, 2, 5, 10, 2, 4, 1, 9, 7, 8, 6, 5, 9, 10, 23, 20, 13, 14]));

    function triFusion(tab) {
        if (tab.length <= 1) return;
        else {
            let tab1 = [];
            let tab2 = [];
            for (let i = 0; i < tab.length; i++) {
                if (i < tab.length / 2)
                    tab1.push(tab[i]);
                else
                    tab2.push(tab[i]);
            }
            triFusion(tab1);
            triFusion(tab2);
            fusion(tab1, tab2, tab);
        }
    }

    function fusion(tab1, tab2, tab) {
        let i = 0;
        let i1 = 0;
        let i2 = 0;
        while (i1 < tab1.length && i2 < tab2.length) {
            if (tab1[i1] < tab2[i2])
                tab[i] = tab1[i1++];
            else
                tab[i] = tab2[i2++];
            i++;
        }
        while (i1 < tab1.length) {
            tab[i] = tab1[i1++];
            i++;
        }
        while (i2 < tab2.length) {
            tab[i] = tab2[i2++];
            i++;
        }
    }

    let a = [3, 4, 6, 2, 5, 1, 8, 7];
    triFusion(a);
    console.log(a);

    function generateRandomNumb(lower, higher) {
        return Math.round(Math.random() * (higher - lower) + lower);
    }

    let nbr = generateRandomNumb(0, 100);
    var result = generateRandomNumb(0, 100);
    var min = 0;
    var max = 100;
    var coup = 1;
    while (nbr !== result) {
        if (nbr > result) {
            min = result;
        } else {
            max = result;
        }
        console.log(result);
        console.log("Max: " + max);
        console.log("Min: " + min);
        result = generateRandomNumb(min, max);
        coup++;
    }
    alert('Réussi en : ' + coup + ". Le nombre est :" + result);

    /*****************************************************************************************************/
    // Binary Tree Search// EXO// Parcourir l'arbre en mode "Binary Search Tree" en respectant les 3 règles évoquées, pour accéder à l'information voulue.

    let tree = [
        {id: 27, parentId: null},
        {id: 14, parentId: 27},
        {id: 35, parentId: 27},
        {id: 10, parentId: 14},
        {id: 19, parentId: 14},
        {id: 31, parentId: 35},
        {id: 42, parentId: 35},
    ];


    let target = 31;

    /*****************************************************************************************************/

    // GET CHAMPIONS' LIST FROM RIOT GAMES API
    var xmlhttp = new XMLHttpRequest();
    var url = "http://ddragon.leagueoflegends.com/cdn/10.20.1/data/fr_FR/champion.json";

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let json = JSON.parse(this.responseText);
            let champions = Object.keys(json['data']);
            let championId = binarySearch(champions, "Trundle"); //123
            let champion = champions[championId];
            console.log(championId);
            console.log(champion);
            console.log(champions);
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    var t0 = performance.now();

    // VARIABLES
    let array = [1, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59];
    let target = 37;

    /* @link : https://miro.medium.com/max/750/1*EYkSkQaoduFBhpCVx7nyEA.gif
     * @author : Florian Doyen <hello@floriandoyen.fr>
     * @version : 1.0
     * @descr : binary search algorithm function to find efficiently the target in a given array
     * @params : <Array> array, the ordered array to read for searching target | <Integer> target, the target to search
     * @return : <Integer> mid, the index of the array where the target is. Returns -1 if not found
     */
    function binarySearch(array, target) {
        // START & END INDEX
        let start = 0;
        let end = array.length - 1;
        while (start <= end) {
            // FIND THE MIDDLE
            let mid = Math.floor((start + end) / 2);

            // FOUND
            if (array[mid] === target) {
                return mid;
            }

            // HIGHER
            if (array[mid] < target) {
                console.log("C'est plus");
                start = mid + 1;
            }

            // LOWER
            if (array[mid] > target) {
                console.log("C'est moins");
                end = mid - 1;
            }
        }
        return -1;
    }

    let found = binarySearch(array, target);
    console.log("index retourné => " + found);
    var t1 = performance.now();
    console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.");

    /**********************************************************************************************************/
    // OBJECT DRIVEN VERSION


    class Node {
        constructor(data, left, right) {
            this.data = data;
            this.left = left;
            this.right = right;
        }
    }

    class BST {
        constructor() {
            // root of a binary seach tree
            this.root = null;
        }

        search(node, data) {
            // if trees is empty return null
            if (node === null)
                return null;
                // if data is less than node's data
            // move left
            else if (data < node.data)
                return this.search(node.left, data);
                // if data is less than node's data
            // move left
            else if (data > node.data)
                return this.search(node.right, data);
                // if data is equal to the node data
            // return node
            else
                return node;
        }
    }

    let n1ll = new Node(10, null, null);
    let n1lr = new Node(19, null, null);
    let n1rl = new Node(31, null, null);
    let n1rr = new Node(42, null, null);
    let n1l  = new Node(14, n1ll, n1lr);
    let n1r  = new Node(35, n1rl, n1rr);
    let n1   = new Node(27, n1l, n1r);
    let bst = new BST();
    let nodeResult = bst.search(n1, 35);


    console.log(nodeResult);


    // PROCEDURAL VERSION (with objects)


    let n1ll = {data: 10, left: null, right: null};
    let n1lr = {data: 19, left: null, right: null};
    let n1rl = {data: 31, left: null, right: null};
    let n1rr = {data: 42, left: null, right: null};
    let n1l = {data: 42, left: n1ll, right: n1lr};
    let n1r = {data: 35, left: n1rl, right: n1rr};
    let n1 = {data: 27, left: n1l, right: n1r};

    function searchTree(node, data) {
        // if trees is empty return null
        if (node === null)
            return null;
            // if data is less than node's data
        // move left
        else if (data < node.data)
            return searchTree(node.left, data);
            // if data is less than node's data
        // move left
        else if (data > node.data)
            return searchTree(node.right, data);
            // if data is equal to the node data
        // return node
        else
            return node;
    }


    let nodeResult = searchTree(n1, 35);
    console.log(nodeResult);
</script>
