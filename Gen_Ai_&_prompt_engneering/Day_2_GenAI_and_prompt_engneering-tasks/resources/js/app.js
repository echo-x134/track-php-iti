

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const chatForm = document.querySelector('[data-chat-form]');

if (chatForm) {
	const history = document.querySelector('[data-chat-history]');
	const input = chatForm.querySelector('[name="message"]');
	const submit = chatForm.querySelector('button[type="submit"]');
	const template = document.querySelector('[data-chat-template]');

	const scrollToLatest = () => {
		history.scrollTop = history.scrollHeight;
	};

	const addMessage = (message, role) => {
		const item = template.content.cloneNode(true);
		const bubble = item.querySelector('[data-chat-bubble]');
		bubble.textContent = message;
		bubble.classList.add(role === 'user' ? 'chat-bubble-user' : 'chat-bubble-assistant');
		item.querySelector('[data-chat-row]').classList.toggle('justify-content-end', role === 'user');
		history.appendChild(item);
		scrollToLatest();
	};

	chatForm.addEventListener('submit', async (event) => {
		event.preventDefault();
		const message = input.value.trim();

		if (!message) return;

		addMessage(message, 'user');
		input.value = '';
		input.disabled = true;
		submit.disabled = true;
		document.querySelector('[data-chat-loading]').classList.remove('d-none');
		scrollToLatest();

		try {
			const response = await fetch(chatForm.action, {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
				},
				body: JSON.stringify({ message }),
			});
			const data = await response.json();
			addMessage(response.ok ? data.message : (data.message || 'Unable to process your request.'), 'assistant');
		} catch (error) {
			addMessage('Unable to reach the chatbot. Please try again.', 'assistant');
		} finally {
			document.querySelector('[data-chat-loading]').classList.add('d-none');
			input.disabled = false;
			submit.disabled = false;
			input.focus();
		}
	});

	scrollToLatest();
}
