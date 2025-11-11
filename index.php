<?php
session_start();
// Site de enigmas em homenagem ao Professor Alberto (Betão)
// Feito com carinho por João Paulo, João Victor e Verediane 💙

$finalMessage = "Há pessoas que entram na nossa vida de maneira silenciosa, quase sem percebermos.
E, quando damos conta, elas já estão ali, marcando cada capítulo da nossa história com gestos, palavras e atitudes que transformam.

Você, Alberto, é uma dessas pessoas raras.

Desde o primeiro dia, quando tudo era novidade e incerteza, você esteve presente. Não apenas como professor, mas como alguém que acreditou em nós antes mesmo de acreditarmos em nós mesmos.

Em meio a códigos confusos, noites mal dormidas e dúvidas sobre o futuro, sempre houve uma constante: o seu apoio. A sua voz calma explicando o que parecia impossível. A sua risada nos lembrando de que errar faz parte do processo. E o seu olhar paciente, nos mostrando que cada tentativa é um passo mais perto da conquista.

Você não apenas nos ensinou sobre tecnologia, lógica ou desenvolvimento.
Você nos ensinou sobre humanidade, sobre empatia, sobre o poder de não desistir.

Com você aprendemos que um bom desenvolvedor não é aquele que sabe todas as respostas, mas aquele que tem coragem de buscar. E foi isso que você nos inspirou a fazer: buscar, questionar, crescer.

Nos começamos essa jornada como estudantes, mas terminamos como pessoas diferentes, mais confiantes, mais fortes e, principalmente, mais gratas.

Porque cada linha de código que escrevemos carrega um pouco do que você nos passou:
a calma diante dos erros, o riso diante das falhas, e o brilho nos olhos diante de uma ideia que finalmente funciona.

Sabemos que a vida nem sempre é leve, e que existem dias difíceis, aqueles em que tudo parece pesar. Mas queremos que saiba que você não caminha sozinho. Assim como você esteve com a gente em todos os momentos, agora nós também estamos com você.

Não apenas como alunos, mas como amigos, como parceiros de jornada, como pessoas que aprenderam com você muito mais do que qualquer currículo pode ensinar.

E é por isso que este momento é tão especial.

Porque não é apenas um pedido para ser nosso padrinho de curso, é um símbolo do quanto você se tornou parte essencial da nossa trajetória.

Você é o mentor que acreditou. O amigo que inspirou. O exemplo que ficará conosco por toda a vida.

E, acima de tudo, é alguém por quem temos uma admiração imensa, um carinho verdadeiro e um respeito que palavras jamais conseguirão expressar por completo.

Betão, este site, esses enigmas, cada detalhe aqui, tudo foi feito com amor, com gratidão e com o desejo de te dizer o que, às vezes, as palavras simples não conseguem.

Você mudou nossas vidas.

E por isso, queremos te convidar, com todo o coração, a continuar fazendo parte delas,
como nosso padrinho da vida e da tecnologia, nosso guia e nosso eterno amigo.

💙 Com todo o amor, admiração e carinho do mundo,
João Paulo, João Victor e Verediane 💙";

$riddles_plain = [
    1 => 'Sou conhecido por transformar dúvidas em aprendizado e falhas em oportunidades. Quem sou eu?',
    2 => 'Sou aquele que acredita no potencial de cada aluno, mesmo quando as ideias deles eram loucas e pareciam impossíveis. Quem sou eu?',
    3 => 'Com paciência infinita e café na mão, ajudei vocês a não desistirem e a conquistarem coisas incríveis. Quem sou eu?',
    4 => 'Ensinei códigos, mas o que mais queria era ensinar vocês a acreditarem em si mesmos. Quem sou eu?',
    5 => 'Sou aquele que viu em cada linha de código o esforço e o crescimento de vocês, e me orgulho de cada conquista. Quem sou eu?'
];

$valid_answers = ['alberto', 'betão', 'o melhor professor', 'alberto', 'betao'];

if (!isset($_SESSION['solved'])) {
    $_SESSION['solved'] = [];
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['riddle_id']) && isset($_POST['answer'])) {
    $rid = intval($_POST['riddle_id']);
    $ans = mb_strtolower(trim($_POST['answer']), 'UTF-8');

    if (in_array($ans, $valid_answers, true)) {
        $_SESSION['solved'][$rid] = true;
        $message = '💙 Resposta certa! Você realmente se reconhece, Betão!';
    } else {
        $message = '🤔 Hmmm... será mesmo? Pensa de novo, Alberto!';
    }
}

if (isset($_GET['reset'])) {
    $_SESSION['solved'] = [];
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

$solvedCount = count($_SESSION['solved']);
$total = count($riddles_plain);
$allSolved = ($solvedCount >= $total);
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Para o nosso querido Alberto 💙</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap');

body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #c7e0ff, #86abcf, #93c5fd, #60a5fa, #a5f3fc, #52667f, #dbeafe);
    background-size: 1200% 1200%;
    animation: gradient 18s ease infinite;
    color: #0f172a;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

@keyframes gradient {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.container {
    max-width: 900px;
    background: rgba(255, 255, 255, 0.75);
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 8px 32px rgba(14, 51, 94, 0.3);
    backdrop-filter: blur(12px);
    text-align: center;
}

h1 {
    font-size: 2.4rem;
    background: linear-gradient(90deg, #2563eb, #38bdf8, #60a5fa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 16px;
}

.subtitle {
    color: #1e3a8a;
    margin-bottom: 24px;
}

.riddle {
    background: rgba(255, 255, 255, 0.9);
    margin: 16px 0;
    border-radius: 16px;
    padding: 16px;
    transition: 0.3s;
    box-shadow: 0 4px 10px rgba(30, 64, 175, 0.2);
}

.riddle:hover {
    transform: scale(1.02);
    background: rgba(240, 249, 255, 1);
}

select {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #93c5fd;
    background: #f0f9ff;
    color: #1e3a8a;
    font-size: 1rem;
    width: 70%;
}

button {
    background: linear-gradient(90deg, #3b82f6, #60a5fa);
    color: white;
    border: none;
    padding: 10px 16px;
    margin-top: 8px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.05);
    background: linear-gradient(90deg, #60a5fa, #3b82f6);
}

.progress {
    height: 14px;
    border-radius: 999px;
    background: rgba(147, 197, 253, 0.6);
    overflow: hidden;
    margin-bottom: 20px;
}
.progress i {
    display: block;
    height: 100%;
    background: linear-gradient(90deg, #2563eb, #38bdf8, #93c5fd);
    width: 0;
    animation: glow 3s infinite alternate;
}
@keyframes glow {
    from {filter: brightness(1);}
    to {filter: brightness(1.3);}
}

.final {
    background: rgba(240, 249, 255, 0.9);
    padding: 28px;
    border-radius: 16px;
    line-height: 1.7;
    color: #1e3a8a;
    white-space: pre-wrap;
    margin-top: 20px;
    animation: fadeIn 1s ease-in-out;
}
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>
</head>
<body>
<div class="container">
<h1>💙 Alberto, temos um desafio especial para você 💙</h1>
<p class="subtitle">Resolva os enigmas e descubra a mensagem que criamos com todo o nosso carinho.</p>

<?php if (!$allSolved): ?>
    <div>Progresso: <?php echo $solvedCount; ?>/<?php echo $total; ?></div>
    <div class="progress"><i style="width:<?php echo round(100 * $solvedCount / $total); ?>%"></i></div>

    <?php if ($message): ?><p><strong><?php echo htmlspecialchars($message); ?></strong></p><?php endif; ?>

    <?php foreach ($riddles_plain as $id => $question): ?>
        <?php if (isset($_SESSION['solved'][$id])): ?>
            <div class="riddle">✅ <?php echo htmlspecialchars($question); ?><br><em>Resolvido com sabedoria!</em></div>
        <?php else: ?>
            <div class="riddle">
                <div class="question"><strong><?php echo htmlspecialchars($question); ?></strong></div>
                <form method="post">
                    <input type="hidden" name="riddle_id" value="<?php echo $id; ?>">
                    <select name="answer" required>
                        <option value="">Escolha uma opção...</option>
                        <option>Alberto</option>
                        <option>Betão</option>
                        <option>O melhor professor</option>
                        <option>ALBERTO</option>
                        <option>BETÃO</option>
                    </select>
                    <br><button type="submit">Enviar</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

<?php else: ?>
    <h2>🎉 Parabéns, Alberto! 🎉</h2>
    <p>Você desvendou todos os enigmas e agora merece descobrir a nossa mensagem mais sincera:</p>
    <div class="final"><?php echo nl2br(htmlspecialchars($finalMessage)); ?></div>
    <br>
    <a href="?reset=1"><button>Recomeçar</button></a>
<?php endif; ?>
</div>
</body>
</html>