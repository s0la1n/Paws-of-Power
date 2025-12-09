// frontend/app/page.tsx
import Link from 'next/link';

export default function HomePage() {
  return (
    <main>
      <h1>Paws of Power</h1>
      <p>Прокачивай своих питомцев, выполняй задания и соревнуйся с друзьями!</p>
      
      <Link href="/auth/register">НАЧАТЬ ПРИКЛЮЧЕНИЕ</Link>
      
      <section>
        <h2>Как это работает?</h2>
        
        <ol>
          <li>
            <strong>Создай аккаунт</strong>
            <p>Быстрая регистрация через email</p>
          </li>
          <li>
            <strong>Выбери питомца</strong>
            <p>Кошки, собаки и другие животные</p>
          </li>
          <li>
            <strong>Выполняй задания</strong>
            <p>Зарабатывай очки и награды</p>
          </li>
          <li>
            <strong>Стань лучшим</strong>
            <p>Возглавь таблицу лидеров</p>
          </li>
        </ol>
      </section>
      
      <section>
        <h2>Готов начать?</h2>
        <p>Присоединяйся к тысячам игроков, которые уже прокачивают своих питомцев!</p>
        
        <Link href="/auth/register">ЗАРЕГИСТРИРОВАТЬСЯ</Link>
        <Link href="/auth/login">У МЕНЯ ЕСТЬ АККАУНТ</Link>
      </section>
      
      <footer>
        <p>Paws of Power</p>
        <p>© 2024 Все права защищены. Игра для любителей животных</p>
      </footer>
    </main>
  );
}