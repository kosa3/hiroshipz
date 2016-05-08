import Foundation

let count: String = readLine()!
let intCount: Int = Int(count)!

var totalPoint = 0
var arr: [String] = []

for i in 0..<intCount {
    var str: String = readLine()!
    arr = str.characters.split(" ").map(String.init)
    
    var correctWord: String = arr[0] // 正解の文字
    var word: String = arr[1] // 回答した文字
    var missMatch: Int = 0 // 文字が一致しない回数
    
    // 文字数が揃っていない場合
    if correctWord.characters.count != word.characters.count {
        continue
    }
    
    // 文字が一致しない場合
    for i in 0..<correctWord.characters.count {

        if correctWord[correctWord.startIndex.advancedBy(i)] != word[word.startIndex.advancedBy(i)] {
            missMatch += 1
        }
    }
    
    switch missMatch {
    case 0:
        totalPoint += 2
    case 1:
        totalPoint += 1
    default:
        break
    }
    
}

print(totalPoint)