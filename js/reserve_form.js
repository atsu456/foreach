function validateForm() {
    var nameInput = document.getElementById('name');
    var emailInput = document.getElementById('email');
    var checkInInput = document.getElementById('check-in');
    var guestsInput = document.getElementById('guests');
    
    var nameError = document.getElementById('nameError');
    var emailError = document.getElementById('emailError');
    var checkInError = document.getElementById('checkInError');
    var guestsError = document.getElementById('guestsError');
    
    var name = nameInput.value.trim();
    var email = emailInput.value.trim();
    var checkIn = checkInInput.value;
    var guests = guestsInput.value;
    
    var options = document.getElementsByName('options');
    var selectedOptions = [];
    for (var i = 0; i < options.length; i++) {
      if (options[i].checked) {
        selectedOptions.push(options[i].value);
      }
    }
    
    // 名前のバリデーション
    if (name === '') {
      nameError.textContent = '名前は必須です';
      nameInput.classList.add('error-input');
      return false;
    } else {
      nameError.textContent = '';
      nameInput.classList.remove('error-input');
    }
    
    // メールアドレスのバリデーション
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
      emailError.textContent = 'メールアドレスは必須です';
      emailInput.classList.add('error-input');
      return false;
    } else if (!emailRegex.test(email)) {
      emailError.textContent = '有効なメールアドレスを入力してください';
      emailInput.classList.add('error-input');
      return false;
    } else {
      emailError.textContent = '';
      emailInput.classList.remove('error-input');
    }
    
    // 宿泊日のバリデーション
    var currentDate = new Date();
    var selectedDate = new Date(checkIn);
    if (checkIn === '') {
      checkInError.textContent = '宿泊日は必須です';
      checkInInput.classList.add('error-input');
      return false;
    } else if (selectedDate < currentDate) {
      checkInError.textContent = '過去の日付は選択できません';
      checkInInput.classList.add('error-input');
      return false;
    } else {
      checkInError.textContent = '';
      checkInInput.classList.remove('error-input');
    }
    
    // 人数のバリデーション
    if (guests === '') {
      guestsError.textContent = '人数は必須です';
      guestsInput.classList.add('error-input');
      return false;
    } else {
      guestsError.textContent = '';
      guestsInput.classList.remove('error-input');
    }
    
    if (selectedOptions.length === 0) {
      alert('追加オプションを選択してください。');
      return false;
    }
    
    // ここでフォームの送信処理を追加する
    
    return true;
  }