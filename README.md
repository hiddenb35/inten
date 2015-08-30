# README #

### git clone ~ 起動までの手順 ###
`1. git clone https://[username]@bitbucket.org/inju/cms.git project`  
`2. cd project`  
`3. git submodule init`  
`4. git submodule update`  
`5. git checkout -b develop origin/develop`  
`6. cd vagrant`  
`7. vagrant up`  


### アクセス ###
ページ | URL
:-:|:-
TOPページ | http://192.168.33.10
phpMyAdmin | http://192.168.33.10/phpmyadmin

# Git Workflow #

### 使用するブランチ ###
1. masterブランチ
2. developブランチ
3. 各featureブランチ

### 開発 ###
+ masterブランチはプロダクトとしてリリース可能な状態に保つため、  
masterブランチへのマージは勝手には行わない
+ 開発を行う際はdevelopブランチから各featureブランチを作成し、  
そのブランチで作業を行う。
+ 各featureブランチでのreset,rebase等は自由に行って良い。  
ただし、一度リモートリポジトリにプッシュしたコミットは  
resetではなく、revertすること
+ developブランチにマージする際は必ずnon-fast-forwardマージとする

### デプロイ ###
+ 本番サーバでSSHログイン後、リモートリポジトリからmasterブランチをgit cloneまたはgit pullで取得


# Develop #

### 各ファイルのパス
タイプ | パス
:-|:-
css | public/assets/css
javascript | public/assets/js
