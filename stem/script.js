const btn1 = document.getElementById('miBtn1');
const btn2 = document.getElementById('miBtn2');
const btn3 = document.getElementById('miBtn3');
const btn4 = document.getElementById('miBtn4');
const btn5 = document.getElementById('miBtn5');

const conta1 = document.getElementById('conta1');
const conta2 = document.getElementById('conta2');
const conta3 = document.getElementById('conta3');
const conta4 = document.getElementById('conta4');
const conta5 = document.getElementById('conta5');


const botones = [
    {btn: btn1, uni: 'ITCJ'},
    {btn: btn2, uni: 'TECMI'},
    {btn: btn3, uni: 'URN'},
    {btn: btn4, uni: 'UACJ'},
    {btn: btn5, uni: 'UACH'}
];

if(usuarioVoto){
    const btnMap = {
        'ITCJ': btn1,
        'TECMI': btn2,
        'URN': btn3,
        'UACJ': btn4,
        'UACH': btn5
    };
    const pMap = {
        'ITCJ': conta1,
        'TECMI': conta2,
        'URN': conta3,
        'UACJ': conta4,
        'UACH': conta5
    };
    const btn = btnMap[usuarioVoto];
    const p_conta = pMap[usuarioVoto];

    btn.disabled = true;
    btn.textContent = 'Ya votaste';
    btn.classList.add('votado');
}

// Bloquear el botón si ya votó
botones.forEach(({btn, uni}) => {
    if(usuarioVoto === uni){
        btn.disabled = true;
        btn.textContent = 'Ya votaste';
        btn.classList.add('votado');
    }
});

function votar(universidad, btn, p_conta) {
    fetch('votar.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'universidad=' + encodeURIComponent(universidad)
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            btn.disabled = true;
            btn.textContent = 'Ya votaste';
            btn.classList.add('votado');
            p_conta.textContent = parseInt(p_conta.textContent) + 1;
        } else {
            alert(data.error);
        }
    });
}


btn1.addEventListener('click', () => votar('ITCJ', btn1, conta1));
btn2.addEventListener('click', () => votar('TECMI', btn2, conta2));
btn3.addEventListener('click', () => votar('URN', btn3, conta3));
btn4.addEventListener('click', () => votar('UACJ', btn4, conta4));
btn5.addEventListener('click', () => votar('UACH', btn5, conta5));
