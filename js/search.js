function search() {
  // alert('hi');
  let query = document.getElementById("search_box").value;
  // data = fake_dictionary;

  isJapanese = isJapanese(query);
  let results = checkJSON(isJapanese, fake_dictionary, query);
  let html = createHTML(results);
  console.log(html);
  console.log(results);
  document.getElementById("results").innerHTML = html;
}

function createHTML(results) {
  let html = '<table><tbody>';
  for (i = 0; i < results.length; i++) {
    keb = 'KANJI (coming soon)';
    reb = 'HIRAGANA/KATAKANA (coming soon)';
    // gloss = results['sense'][0]['gloss'];
    gloss = 'ENGLISH (coming soon)';

    html += '<tr class="one_word"><td class="keb"><span>'
    html += keb;
    html += '</span></td><td class="reb"><span>';
    html += reb;
    html += '</span></td><td class="gloss"><span>';
    html += gloss;
    html += '</span></td><td class=""><i class="fa fa-plus-circle plus_sign" href=""></i></td></tr>';
  }
  html += '</tbody></table>';
  return html;
}

function checkJSON(isJapanese, fake_dictionary, query) {
  // console.log(fake_dictionary);
  // console.log('checkJSON');
  var results = [];
  if (isJapanese) {
    // console.log('is japanese', query);
    for (var word = 0; word < fake_dictionary.length; word++) {}
  } else {
    for (var word = 0; word < fake_dictionary.length; word++) {
      gloss = fake_dictionary[word]['sense'][0]['gloss'];
      // console.log(gloss);
      for (var definition = 0; definition < gloss.length; definition++) {
        if (gloss[definition] == query) {
          results.push(fake_dictionary[word]);
        }
      }
    }
  }
  return results;
}

function isJapanese(query) {
  var regex = /[\u3000-\u303F]|[\u3040-\u309F]|[\u30A0-\u30FF]|[\uFF00-\uFFEF]|[\u4E00-\u9FAF]|[\u2605-\u2606]|[\u2190-\u2195]|\u203B/g;
  if (regex.test(query)) {
    return true;
  } else {
    return false;
  }
}
