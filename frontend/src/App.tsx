import { Routes, Route, Link } from 'react-router-dom'
import Home from './pages/Home'
import Test from './pages/Test.tsx'
import Categories from './pages/Categories.tsx'

function App() {
  return (
    <div>
      <nav>
        <Link to="/">Home</Link> | <Link to="/Test">Test</Link> |{' '}
        <Link to="/Categories">Categories</Link>
      </nav>

      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/Test" element={<Test />} />
        <Route path="/Categories" element={<Categories />} />
      </Routes>
    </div>
  )
}

export default App
