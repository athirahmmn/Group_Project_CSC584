function addStep() {
    const stepsContainer = document.getElementById('stepsContainer');
    const stepDiv = document.createElement('div');
    stepDiv.classList.add('step');
  
    const stepNumberInput = document.createElement('input');
    stepNumberInput.type = 'number';
    stepNumberInput.value = stepNumber;
    stepNumberInput.disabled = true;
    stepDiv.appendChild(stepNumberInput);
  
    const stepDescriptionTextarea = document.createElement('textarea');
    stepDescriptionTextarea.placeholder = 'Enter step description';
    stepDescriptionTextarea.addEventListener('input', function() {
      autoAdjustRows(this);
    });
    stepDiv.appendChild(stepDescriptionTextarea);
  
    const removeStepBtn = document.createElement('button');
    removeStepBtn.type = 'button';
    removeStepBtn.classList.add('remove-btn');
    removeStepBtn.textContent = 'Remove';
    removeStepBtn.addEventListener('click', function() {
      stepDiv.remove();
      renumberSteps();
    });
    stepDiv.appendChild(removeStepBtn);
  
    stepsContainer.appendChild(stepDiv);
  
    stepNumber++;
  }
  