import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { ArrowRight, Gauge, Shield, Wrench } from "lucide-react"

const featuredBikes = [
  {
    id: 1,
    name: "Yamaha YZF-R1",
    category: "Sport",
    price: 18499,
    year: 2024,
    image: "/yamaha-r1-sport-motorcycle-side-view.jpg",
  },
  {
    id: 2,
    name: "Harley-Davidson Street Glide",
    category: "Cruiser",
    price: 27999,
    year: 2024,
    image: "/harley-davidson-street-glide-cruiser-motorcycle.jpg",
  },
  {
    id: 3,
    name: "BMW R 1250 GS",
    category: "Adventure",
    price: 19995,
    year: 2024,
    image: "/bmw-r1250gs-adventure-motorcycle.jpg",
  },
]

const features = [
  {
    icon: Shield,
    title: "Certified Quality",
    description: "Every motorcycle undergoes rigorous inspection and certification process",
  },
  {
    icon: Gauge,
    title: "Performance Tested",
    description: "All bikes are performance tested to ensure peak condition",
  },
  {
    icon: Wrench,
    title: "Service & Support",
    description: "Comprehensive warranty and maintenance support included",
  },
]

export default function HomePage() {
  return (
    <main className="min-h-screen pt-16">
      {/* Hero Section */}
      <section className="relative h-[90vh] flex items-center justify-center overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-background via-background/50 to-background z-10" />
        <img
          src="/sport-motorcycle-racing-on-track-motion-blur.jpg"
          alt="Hero motorcycle"
          className="absolute inset-0 w-full h-full object-cover"
        />

        <div className="relative z-20 container mx-auto px-4 lg:px-8 text-center">
          <h1 className="text-5xl md:text-7xl font-bold mb-6 text-balance">
            Ride the
            <span className="block text-primary">Ultimate Machine</span>
          </h1>
          <p className="text-lg md:text-xl text-muted-foreground mb-8 max-w-2xl mx-auto text-pretty">
            Discover premium motorcycles engineered for performance, style, and the open road
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button asChild size="lg" className="text-base">
              <Link href="/inventory">
                Browse Inventory <ArrowRight className="ml-2 h-4 w-4" />
              </Link>
            </Button>
            <Button asChild size="lg" variant="outline" className="text-base bg-transparent">
              <Link href="/contact">Contact Us</Link>
            </Button>
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="py-20 bg-card">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {features.map((feature, index) => (
              <div key={index} className="text-center">
                <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 mb-4">
                  <feature.icon className="h-8 w-8 text-primary" />
                </div>
                <h3 className="text-xl font-semibold mb-2">{feature.title}</h3>
                <p className="text-muted-foreground text-pretty">{feature.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Featured Bikes Section */}
      <section className="py-20">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="text-center mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">Featured Motorcycles</h2>
            <p className="text-muted-foreground text-lg">Handpicked selection of our finest bikes</p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {featuredBikes.map((bike) => (
              <Card
                key={bike.id}
                className="overflow-hidden group cursor-pointer hover:border-primary transition-colors"
              >
                <div className="relative h-64 overflow-hidden">
                  <img
                    src={bike.image || "/placeholder.svg"}
                    alt={bike.name}
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                  />
                  <div className="absolute top-4 right-4 bg-primary text-primary-foreground px-3 py-1 rounded-full text-sm font-semibold">
                    {bike.year}
                  </div>
                </div>
                <CardContent className="p-6">
                  <div className="text-sm text-muted-foreground mb-2">{bike.category}</div>
                  <h3 className="text-xl font-bold mb-3">{bike.name}</h3>
                  <div className="flex items-center justify-between">
                    <span className="text-2xl font-bold text-primary">${bike.price.toLocaleString()}</span>
                    <Button asChild variant="ghost" size="sm">
                      <Link href={`/inventory/${bike.id}`}>
                        View Details <ArrowRight className="ml-2 h-4 w-4" />
                      </Link>
                    </Button>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>

          <div className="text-center mt-12">
            <Button asChild size="lg" variant="outline">
              <Link href="/inventory">View All Motorcycles</Link>
            </Button>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-card">
        <div className="container mx-auto px-4 lg:px-8 text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">Ready to Ride?</h2>
          <p className="text-lg text-muted-foreground mb-8 max-w-2xl mx-auto text-pretty">
            Visit our showroom or schedule a test ride today. Our team is ready to help you find your perfect
            motorcycle.
          </p>
          <Button asChild size="lg">
            <Link href="/contact">Schedule a Test Ride</Link>
          </Button>
        </div>
      </section>
    </main>
  )
}
