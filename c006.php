<?php
$data = getLineDatasSplitedBySpace(fgets(STDIN));
$users = $data[1];//ユーザー数
$rank = $data[2];//トップ何番目か
$params = getLineDatasSplitedBySpace(fgets(STDIN));

//ユーザースコアを求める
for ($i = 0; $i < $users; $i++) {
	$userScore = 0;
	$userDatas = getLineDatasSplitedBySpace(fgets(STDIN));
	// ここ若干ずるい。引数でパラメータ数は与えられているのに・・・
	for ($j = 0; $j < count($params); $j++) {
		$userScore += $params[$j] * $userDatas[$j];
	}
	$userScores[] = round($userScore);
}

// 好みの問題だけど、わざわざここで逆順ソートせずに
// 下のfor分をカウントダウンさせるでも良い。
rsort($userScores);//ユーザースコアを降順にソート

//上位$rankのユーザースコアを出力
for ($i = 0; $i < $rank; $i++) {
	echo $userScores[$i] . "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
