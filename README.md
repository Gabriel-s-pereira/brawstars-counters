# BrawlMatch

> Um sistema desenvolvido em PHP para registrar e analisar o desempenho de partidas ranqueadas do **Brawl Stars**, permitindo acompanhar estatísticas reais de vitória e derrota de cada Brawler em diferentes modos de jogo e mapas.

## 📖 Sobre o projeto

O **BrawlCounters** nasceu da necessidade de registrar estatísticas que o próprio jogo não fornece de forma detalhada.

O sistema permite registrar cada partida disputada no modo ranqueado, armazenando informações como o modo de jogo, mapa, Brawler utilizado, resultado da partida e o KD (Kills/Deaths). A partir desses dados, o sistema calcula automaticamente a taxa de vitória de cada Brawler em cada mapa e modo de jogo, oferecendo um panorama mais preciso para auxiliar na escolha dos personagens.

Além de desenvolver o sistema web em PHP, o projeto também foi pensado como uma aplicação desktop de fácil utilização, contando com launcher próprio, PHP portátil e instalador.

---

# ✨ Funcionalidades

* Registro de partidas ranqueadas.
* Seleção do modo de jogo.
* Seleção do mapa.
* Seleção do Brawler utilizado.
* Registro de vitória ou derrota.
* Registro do KD (Kills / Deaths).
* Armazenamento em banco SQLite.
* Cálculo automático da taxa de vitória.
* Exibição dos Brawlers ordenados por desempenho.

---

# 🚀 Recursos do projeto

* Sistema totalmente offline.
* Banco de dados SQLite embarcado.
* Banco criado automaticamente na primeira execução.
* Não requer instalação de servidor web.
* PHP portátil.
* Launcher próprio.
* Instalador próprio.
* Encerramento automático do servidor ao fechar a aplicação.

---

# ⚙️ Como funciona

O launcher desenvolvido para o projeto automatiza toda a execução da aplicação.

Ao iniciar o sistema ele:

* inicia o PHP portátil;
* verifica se a porta necessária está disponível;
* inicia o servidor local;
* abre automaticamente o navegador padrão.

Ao fechar a aplicação, o launcher encerra automaticamente o servidor PHP, evitando processos executando em segundo plano.

---

# 💾 Instalação

O instalador foi desenvolvido utilizando **Inno Setup**.

Durante a instalação são realizados automaticamente os seguintes passos:

* cópia dos arquivos da aplicação;
* instalação em *Program Files*;
* instalação do PHP portátil;
* criação dos atalhos;
* criação do desinstalador.

---

# 🗄️ Banco de dados

O projeto utiliza **SQLite** como banco de dados.

Características:

* criação automática na primeira execução;
* duas tabelas principais;
* não requer configuração adicional;
* banco embarcado junto à aplicação.

---

# 🛠️ Tecnologias utilizadas

* PHP 8.x
* SQLite
* HTML5
* CSS3
* AutoHotkey
* Inno Setup

---

# 📂 Estrutura do projeto

```text
app/
│
├── assets/
├── banco/
│
dev/
ext/
extras/
│
├── ssl/
│
lib/
└── enchant/
```

---

# 📸 Capturas de tela

## Tela inicial

<img width="958" height="430" alt="image" src="https://github.com/user-attachments/assets/b19379e1-f704-447c-936f-7a8fb40aa8ce" />
</br>
<img width="959" height="434" alt="image" src="https://github.com/user-attachments/assets/56337059-498c-4dc2-81c8-2a2276784791" />


---

## Registro de partida

<img width="959" height="442" alt="image" src="https://github.com/user-attachments/assets/21f55d71-1ea8-4063-9152-3646631a38fc" />
</br>
<img width="956" height="430" alt="image" src="https://github.com/user-attachments/assets/b283278b-3847-40b2-99ba-b47ca421e501" />

---

## Instalador

<img width="953" height="400" alt="image" src="https://github.com/user-attachments/assets/97a0926a-e8ac-4684-8fdf-94bcf789df82" />


---

# 🎯 Objetivo

Este projeto foi desenvolvido com dois objetivos principais:

* solucionar uma necessidade pessoal de acompanhamento de estatísticas do jogo Brawl Stars;
* exercitar conhecimentos relacionados ao desenvolvimento de aplicações web e distribuição de software.

---

# 📚 Aprendizados

Durante o desenvolvimento deste projeto foram praticados conhecimentos em:

* organização de projetos PHP;
* modelagem utilizando SQLite;
* manipulação de arquivos;
* automação de execução de aplicações;
* empacotamento de software para distribuição.

---

# 🔮 Melhorias futuras

* filtros avançados de pesquisa;
* gráficos de desempenho;
* exportação das estatísticas;
* backup automático do banco de dados;
* atualização automática do sistema.

---

# 📄 Licença

Este projeto está licenciado sob a **MIT License**.

Sinta-se à vontade para estudar, modificar e utilizar o código conforme os termos da licença.
