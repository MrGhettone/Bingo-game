<?php

session_start();

$index = true;

if(isset($_GET["logout"])) {
  unset($_SESSION["user"]);
}

if(isset($_SESSION["user"])){
  $userId = $_SESSION["user"]["id"];
  
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=bingo', 'root', '');
  $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $statement = $pdo->prepare("SELECT * FROM `users` WHERE id = :id");
  
  $statement->bindValue(':id', $userId);
  
  $statement->execute();
  
  $user = $statement->fetch(PDO::FETCH_ASSOC);
}



?>


<!DOCTYPE html>
<html lang="en">
  <?php include_once "views/head.php"; ?>
  <body>
    <?php include_once "views/header.php"; ?>
    <div class="container cl">

      <h1 class="text-center">BINGO BETA</h1>

      <div class="float-md-left instruction">
        <p>Benvenuto al Bingo Beta, se sei loggato, potrai comprare una cartella decidere di cambiarla e giocare, altrimenti corri a loggarti. Per i nuovi iscritti c' è un bonus di 10 &euro;. Scegli quanto puntare e inizia l' estrazione, 30 numeri e se sarai fortunato potrai vincere dal terno al bingo.</p>
        <ul class="list-unstyled">
          <li>Terno - 3 numeri sulla stessa riga: puntata raddoppiata;</li>
          <li>Quaterna - 4 numeri sulla stessa riga: puntata triplicata;</li>
          <li>Cinquina - 5 numeri sulla stessa riga: puntata quintuplicata;</li>
          <li>Bingo - Tutta la cartella contiene i numeri estratti: puntata moltiplicata per 25.</li>
        </ul>
      </div>
      
      <div class="table_width float-md-right alert-secondary p-2 rounded border border-secondary">
        <table class="table table-bordered m-0 table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col-md">Nome</th>
              <th scope="col-md">Cognome</th>
              <th scope="col-md">Saldo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php if(isset($_SESSION["user"])) {echo $user["name"];} else {echo "Nome";}?></td>
              <td><?php if(isset($_SESSION["user"])) {echo $user["surname"];} else {echo "cognome";}?></td>
              <td id="balance"><?php if(isset($_SESSION["user"])) {echo $user["balance"] . " &euro;";}else{echo "saldo";}?></td>
            </tr>
          </tbody>
        </table>
        <div class="my-3">
          <select class="custom-select" id="bet-select">
            <option selected>Scegli quanto puntare</option>
            <option value="1">1 &euro;</option>
            <option value="2">2 &euro;</option>
            <option value="5">5 &euro;</option>
          </select>
        </div>
        <div class="text-center">
          <?php if(isset($_SESSION["user"])): ?>
            <button class="btn btn-dark" onclick="generateNum()">Genera cartella</button>
          <?php else : ?>
            <a class="btn btn-dark" href="login.php">Genera cartella</a>
          <?php endif; ?>
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="history()">Storico partite</button>
        </div>


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
              <table class="table table-bordered m-0 table-sm">
                <thead class="bg-dark" style="color: white;">
                  <tr>
                    <td scope="col">Data Partita</td>
                    <td scope="col">Gicata &euro;</td>
                    <td scope="col">Vincita &euro;</td>
                  </tr>
                </thead>
                <tbody id="modal">

                </tbody>
              </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="container">
      <div class="cartell my-3 p-2 alert alert-warning border border-warning">
        <h5 class="m-0">BINGO BETA</h5>
        <p class="m-0">questa e la tua cartella</p>
        <table class="table m-0 table-sm">
          <tbody>
            <tr class="rowcartel1">
              <td class="num-1-9 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-10-19 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-20-29 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-30-39 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-40-49 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-50-59 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-60-69 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-70-79 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-80-90 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
            </tr>
            <tr class="rowcartel2">
              <td class="num-1-9 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-10-19 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-20-29 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-30-39 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-40-49 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-50-59 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-60-69 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-70-79 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-80-90 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
            </tr>
            <tr class="rowcartel3">
              <td class="num-1-9 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-10-19 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-20-29 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-30-39 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-40-49 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-50-59 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-60-69 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-70-79 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
              <td class="num-80-90 num-cartel border border-warning"><p class="hidden m-0 text-center">xx</p></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-center alert alert-info p-4 border border-info extraction">
        <h1>TABELLONE NUMERI ESTRATTI</h1>
        <p>Hai 2 possibilità di estrazione veloce o lenta!</p>
        <button class="btn btn-primary m-2" onclick="luckyNumber(10)">Estrai rapidamente</button>
        <button class="btn btn-primary m-2" onclick="luckyNumber(1000)">Estrai normalmente</button>
        
        <div class="bingo-num">
          <table class="table m-0 table-sm">
            <tbody>
              <tr>
                <td class="colmd text-center border border-info" id="1">1</td>
                <td class="colmd text-center border border-info" id="2">2</td>
                <td class="colmd text-center border border-info" id="3">3</td>
                <td class="colmd text-center border border-info" id="4">4</td>
                <td class="colmd text-center border border-info" id="5">5</td>
                <td class="colmd text-center border border-info" id="6">6</td>
                <td class="colmd text-center border border-info" id="7">7</td>
                <td class="colmd text-center border border-info" id="8">8</td>
                <td class="colmd text-center border border-info" id="9">9</td>
                <td class="colmd text-center border border-info" id="10">10</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="11">11</td>
                <td class="colmd text-center border border-info" id="12">12</td>
                <td class="colmd text-center border border-info" id="13">13</td>
                <td class="colmd text-center border border-info" id="14">14</td>
                <td class="colmd text-center border border-info" id="15">15</td>
                <td class="colmd text-center border border-info" id="16">16</td>
                <td class="colmd text-center border border-info" id="17">17</td>
                <td class="colmd text-center border border-info" id="18">18</td>
                <td class="colmd text-center border border-info" id="19">19</td>
                <td class="colmd text-center border border-info" id="20">20</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="21">21</td>
                <td class="colmd text-center border border-info" id="22">22</td>
                <td class="colmd text-center border border-info" id="23">23</td>
                <td class="colmd text-center border border-info" id="24">24</td>
                <td class="colmd text-center border border-info" id="25">25</td>
                <td class="colmd text-center border border-info" id="26">26</td>
                <td class="colmd text-center border border-info" id="27">27</td>
                <td class="colmd text-center border border-info" id="28">28</td>
                <td class="colmd text-center border border-info" id="29">29</td>
                <td class="colmd text-center border border-info" id="30">30</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="31">31</td>
                <td class="colmd text-center border border-info" id="32">32</td>
                <td class="colmd text-center border border-info" id="33">33</td>
                <td class="colmd text-center border border-info" id="34">34</td>
                <td class="colmd text-center border border-info" id="35">35</td>
                <td class="colmd text-center border border-info" id="36">36</td>
                <td class="colmd text-center border border-info" id="37">37</td>
                <td class="colmd text-center border border-info" id="38">38</td>
                <td class="colmd text-center border border-info" id="39">39</td>
                <td class="colmd text-center border border-info" id="40">40</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="41">41</td>
                <td class="colmd text-center border border-info" id="42">42</td>
                <td class="colmd text-center border border-info" id="43">43</td>
                <td class="colmd text-center border border-info" id="44">44</td>
                <td class="colmd text-center border border-info" id="45">45</td>
                <td class="colmd text-center border border-info" id="46">46</td>
                <td class="colmd text-center border border-info" id="47">47</td>
                <td class="colmd text-center border border-info" id="48">48</td>
                <td class="colmd text-center border border-info" id="49">49</td>
                <td class="colmd text-center border border-info" id="50">50</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="51">51</td>
                <td class="colmd text-center border border-info" id="52">52</td>
                <td class="colmd text-center border border-info" id="53">53</td>
                <td class="colmd text-center border border-info" id="54">54</td>
                <td class="colmd text-center border border-info" id="55">55</td>
                <td class="colmd text-center border border-info" id="56">56</td>
                <td class="colmd text-center border border-info" id="57">57</td>
                <td class="colmd text-center border border-info" id="58">58</td>
                <td class="colmd text-center border border-info" id="59">59</td>
                <td class="colmd text-center border border-info" id="60">60</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="61">61</td>
                <td class="colmd text-center border border-info" id="62">62</td>
                <td class="colmd text-center border border-info" id="63">63</td>
                <td class="colmd text-center border border-info" id="64">64</td>
                <td class="colmd text-center border border-info" id="65">65</td>
                <td class="colmd text-center border border-info" id="66">66</td>
                <td class="colmd text-center border border-info" id="67">67</td>
                <td class="colmd text-center border border-info" id="68">68</td>
                <td class="colmd text-center border border-info" id="69">69</td>
                <td class="colmd text-center border border-info" id="70">70</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="71">71</td>
                <td class="colmd text-center border border-info" id="72">72</td>
                <td class="colmd text-center border border-info" id="73">73</td>
                <td class="colmd text-center border border-info" id="74">74</td>
                <td class="colmd text-center border border-info" id="75">75</td>
                <td class="colmd text-center border border-info" id="76">76</td>
                <td class="colmd text-center border border-info" id="77">77</td>
                <td class="colmd text-center border border-info" id="78">78</td>
                <td class="colmd text-center border border-info" id="79">79</td>
                <td class="colmd text-center border border-info" id="80">80</td>
              </tr>
              <tr>
                <td class="colmd text-center border border-info" id="81">81</td>
                <td class="colmd text-center border border-info" id="82">82</td>
                <td class="colmd text-center border border-info" id="83">83</td>
                <td class="colmd text-center border border-info" id="84">84</td>
                <td class="colmd text-center border border-info" id="85">85</td>
                <td class="colmd text-center border border-info" id="86">86</td>
                <td class="colmd text-center border border-info" id="87">87</td>
                <td class="colmd text-center border border-info" id="88">88</td>
                <td class="colmd text-center border border-info" id="89">89</td>
                <td class="colmd text-center border border-info" id="90">90</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    
    <?php include_once "views/footer.php"; ?>
  </body>
</html>